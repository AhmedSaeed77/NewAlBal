<?php

namespace App\Http\Controllers\Users;

use App\Repository\Admin\PackageRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Library\CoursePart;
use Illuminate\Support\Facades\DB;

class CourseDetailsController extends Controller
{
    public $packageRepository;

    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function show($package_id, $part_id){
        $video_id = \request()->video_id;

        $packageVideos = $this->packageRepository->packagePartVideos($package_id, $part_id);

        if(!count($packageVideos)){
            return redirect()->route('student.dashboard')->with('error', 'No Content');
        }

        $currentVideo = $packageVideos->filter(function($row)use($video_id){
            if($video_id){
                return $row->video_id == $video_id;
            }
            return true;
        })->first();
        if(!$currentVideo){
            $currentVideo = $packageVideos->first();
        }

        $videoMaterial = DB::table('video_attachments')->where('video_id', $currentVideo->video_id)
            ->get()->map(function($row){
                $temp = explode('/', $row->file_url);
                if(isset($temp[0])) unset($temp[0]);
                $row->download_url = asset('storage/'.implode('/', $temp));
                return $row;
            });

        $videoIframe = app('App\Http\Controllers\Admin\VimeoController')->getVimeoVideo($currentVideo->vimeo_id);
        
        $videoIframe = $videoIframe['body']['embed']['html'];

        return view('student.course_details')->with('packageVideos', $packageVideos)
            ->with('part_id', $part_id)
            ->with('package_id', $package_id)
            ->with('currentVideo', $currentVideo)
            ->with('materials', $videoMaterial)
            ->with('videoIframe', $videoIframe);
    }
}
