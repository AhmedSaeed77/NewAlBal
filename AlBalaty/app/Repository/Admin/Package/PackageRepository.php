<?php


namespace App\Repository\Admin\Package;

use App\Models\Library\CoursePart;
use App\Models\Package\Packages;
use App\Models\Package\Subscription;
use App\Payment\Payment;
use App\Repository\Admin\PackageRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageRepository implements PackageRepositoryInterface
{

    use Payment;
    /**
     * @param Request $request
     * @return mixed
     */
    public function packagesQuery(Request $request)
    {
        $courses_query_parts = [];
        if($request->has('course_id') && $request->part_id == ''){
            $courses_query_parts = CoursePart::whereIn('course_id', $request->course_id)->pluck('id')->toArray();
        }
        $packages_id = DB::table('packages')
            ->where('active', 1)
            ->where('approved', 1)
            ->join('package_scoops', 'packages.id', 'package_scoops.package_id')
            ->groupBy('packages.id')
            ->where(function($query)use($request, $courses_query_parts){
                // only course_id is given
                if($request->has('course_id') && is_iterable($request->course_id) && !empty($request->course_id) && $request->part_id == ''){
                    $query->whereIn('package_scoops.part_id', $courses_query_parts);
                }else if($request->has('part_id') && is_iterable($request->part_id)){
                    foreach($request->part_id as $pi){
                        $query->orWhere('package_scoops.part_id', $pi);
                    }
                }
            })
            ->where(function($query)use($request){
                if($request->has('teacher_id')){
                    foreach($request->teacher_id as $teacher_id){
                        $query->orWhere('packages.admin_id', $teacher_id);
                    }
                }
            })
            ->select('packages.id')->pluck('id')->toArray();

        return [$this->batchPackage((array)$packages_id), $packages_id, $request->all()];
    }


    /**
     * @param array $package_id
     * @param int|null $limit
     * @param bool $onlyActive
     * @return mixed
     */
    public function batchPackage(array $package_id, int $limit = null, bool $onlyActive = true)
    {
        if(!count($package_id) && !$limit){
            return collect([]);
        }

        $packages = Packages::where(function($query)use($package_id, $onlyActive){
                if(count($package_id)){
                    foreach($package_id as $pi){
                        $query->orWhere('packages.id', $pi);
                        $query->orWhere('packages.slug', $pi); // for searching with slug
                    }
                }
                if($onlyActive){
                   $query->where([
                       'active'     => 1,
                       'approved'   => 1,
                   ]);
                }
            })
            ->leftJoin('package_scoops', 'packages.id', 'package_scoops.package_id')
            ->leftJoin('package_exams', 'packages.id', 'package_exams.package_id')
            ->leftJoin('user_packages', 'packages.id', 'user_packages.package_id')
            ->leftJoin('video_distributions', 'package_scoops.part_id', 'video_distributions.part_id')
            ->leftJoin('videos', function($join){
                $join->on('videos.admin_id', 'packages.admin_id');
                $join->on('videos.id', 'video_distributions.video_id');
            })
            ->join('admins', 'packages.admin_id', 'admins.id')
            ->groupBy('packages.id')
            ->select([
                'packages.id','packages.name AS package_name', 'packages.id AS package_id',
                'packages.renew_period_in_days', 'packages.slug',
                'packages.description', 'packages.what_you_learn', 'packages.requirement', 'packages.who_course_for',
                'packages.lang', 'packages.img',
                'admins.name AS teacher_name',
                'packages.active', 'packages.approved',
                DB::raw('(COUNT(CASE WHEN package_scoops.part_id IS NOT NULL THEN 1 ELSE null END)) AS parts_count'),
                DB::raw('(COUNT(CASE WHEN user_packages.id IS NOT NULL THEN 1 ELSE null END)) AS students_count'),
                DB::raw('(COUNT(CASE WHEN video_distributions.part_id IS NOT NULL THEN 1 ELSE null END)) AS videos_count')
            ])
            ->orderBy('packages.created_at')
            ->get()->map(function($package){
                $package->img_url = asset('storage/package/imgs/'.basename($package->img));
                $package->pricing = $this->PriceDetails(\request()->coupon ?? '', $package->package_id, 'package');
                $package->description_notags = strip_tags($package->description);
                return $package;
            });
        return ($limit ? $packages->take($limit): $packages);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function recent(int $limit = 6)
    {
        return $this->batchPackage([], $limit);
    }

    /**
     * @param $package_identifier | could be slug or id
     * @return mixed
     */
    public function singlePackage($package_identifier)
    {
        $package = $this->batchPackage([$package_identifier]);
        if($package && count($package)){
            return $package->first();
        }
        return null;
    }

    /**
     * @param int $package_id
     * @param int $part_id
     * @return mixed
     */
    public function packagePartVideos(int $package_id, int $part_id)
    {
        if(!$this->checkCurrentUserSubscription($package_id))
            return collect([]);

        $teacher_id = DB::table('packages')->where('id', $package_id)->select('admin_id AS teacher_id')->first();
        if(!$teacher_id)
            return collect([]);

        $teacher_id = $teacher_id->teacher_id;

        return (DB::table('video_distributions')
            ->where('video_distributions.part_id', $part_id)
            ->where('videos.admin_id', $teacher_id)
            ->join('videos', 'video_distributions.video_id', 'videos.id')
            ->leftJoin('paths', 'video_distributions.path_id', '=', 'paths.id')
            ->leftJoin('path_courses', 'video_distributions.course_id', '=', 'path_courses.id')
            ->leftJoin('course_parts', 'video_distributions.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'video_distributions.chapter_id', '=', 'part_chapters.id')
            ->leftJoin('chapter_topics', 'video_distributions.topic_id', '=', 'chapter_topics.id')
            ->leftJoin('topic_skills', 'video_distributions.skill_id', '=', 'topic_skills.id')
            ->select([
                'paths.title AS path_title', 'paths.id AS path_id',
                'path_courses.title AS course_title', 'path_courses.id AS course_id',
                'course_parts.title AS part_title', 'course_parts.id AS part_id',
                'part_chapters.title AS chapter_title', 'part_chapters.id AS chapter_id',
                'chapter_topics.title AS topic_title', 'chapter_topics.id AS topic_id',
                'topic_skills.title AS skill_title', 'topic_skills.id AS skill_id',
                'videos.*', 'video_distributions.*', 'videos.created_at',
            ])->get()
        );

    }

    /**
     * @param string $country_code
     * @return Collection|mixed
     */
    public function getPartsByCountry(string $country_code = null){
        return (DB::table('packages')
            ->where(['active' => 1, 'approved' => 1])
            ->join('package_scoops', 'packages.id', 'package_scoops.package_id')
            ->leftJoin('course_parts', 'package_scoops.part_id', '=', 'course_parts.id')
            ->leftJoin('path_courses', 'course_parts.course_id', '=', 'path_courses.id')
            ->leftJoin('paths', 'path_courses.path_id', '=', 'paths.id')
            ->leftJoin('countries', 'paths.country_id', '=', 'countries.id')
            ->where(function($query)use($country_code){
                if($country_code){
                    $query->where('countries.code', $country_code);
                }
            })
            ->groupBy('course_parts.id')
            ->select([
                'course_parts.title AS part_title', 'course_parts.id AS part_id',
                DB::raw('(COUNT(*)) AS package_count'),
                'paths.id AS path_id', 'path_courses.id AS course_id',
            ])->get()
        );
    }

    /**
     * return more detailed data about each package unlike getCurrentUserSubscriptions method
     * @param int $user_id
     * @param int|null $limit - limiting packages count
     * @return mixed
     */
    public function getUserPackages(int $user_id, int $limit = null)
    {
        $today = Carbon::now();
        $data = DB::table('subscriptions')
            ->where([
                ['subscriptions.start', '<=', $today],
                ['subscriptions.end', '>=', $today],
            ])
            ->where('subscriptions.user_id', $user_id)
            ->join('packages', 'subscriptions.package_id', 'packages.id')
            ->join('package_scoops', 'subscriptions.package_id', 'package_scoops.package_id')
            ->join('admins', 'packages.admin_id', 'admins.id')
            ->leftJoin('course_parts', 'package_scoops.part_id', '=', 'course_parts.id')
            ->select([
                'course_parts.title AS part_title', 'course_parts.id AS part_id',
                'packages.name AS package_name', 'packages.id AS package_id',
                'admins.name AS teacher_name', 'admins.id AS teacher_id',
            ])->get()->groupBy('package_id');
        return $limit? $data->take($limit): $data;
    }

    /**
     * @param int|null $limit
     * @return mixed
     */
    public function getCurrentUserPackages(int $limit = null)
    {
        $thisUser = Auth::user();
        if($thisUser) {
            return $this->getUserPackages(Auth::user()->id, $limit);
        }
        return collect([]);
    }

    /**
     * @param int $user_id
     * @param int|null $package_id
     * @return mixed
     */
    public function getUserActiveSubscriptions(int $user_id, int $package_id = null)
    {
        $today = Carbon::now();
        return (DB::table('subscriptions')
            ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
            ->where([
                ['user_id', '=', $user_id],
                ['start', '<=', $today],
                ['end', '>=', $today],
            ])
            ->where(function($query)use($package_id){
                if($package_id){
                    $query->where('package_id', $package_id);
                }
            })
            ->select([
                'subscriptions.*' ,'packages.name AS package_name', 'packages.renew_period_in_days'
            ])
            ->get()
        );
    }

    /**
     * @param int|null $package_id
     * @return mixed
     */
    public function getCurrentUserActiveSubscriptions(int $package_id = null)
    {
        $thisUser = Auth::user();
        if($thisUser){
            return $this->getUserActiveSubscriptions($thisUser->id, $package_id);
        }
        return collect([]);
    }

    /**
     * @param int $package_id
     * @return mixed
     */
    public function checkCurrentUserSubscription(int $package_id)
    {
        return $this->getCurrentUserActiveSubscriptions($package_id)->first();
    }


    /**
     * @param int $user_id
     * @param int $package_id
     * @return mixed
     */
    public function renewPackageSubscription(int $user_id, int $package_id)
    {
        $package = DB::table('packages')->where('id', $package_id)->first();
        if(!$package){
            return false;
        }

        $renew_period = $package->renew_period_in_days ? $package->renew_period_in_days: 1000;
        $now = Carbon::now();
        $end = Carbon::now()->addDays($renew_period);
        $attributes = ['user_id' => $user_id, 'package_id' => $package_id];
        $values = ['start' => $now, 'end' => $end];
        $timeStamps = ['created_at' => $now, 'updated_at' => $now];

        $sub = DB::table('subscriptions')->where($attributes);
        if($sub->exists()){
            $sub->update($values);
        }else{
            $sub->insert(array_merge($attributes, $values, $timeStamps));
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function userPackagesMaterials()
    {
        $today = Carbon::now();
        return (DB::table('subscriptions')
            ->where([
                ['user_id', '=', Auth::user()->id],
                ['start', '<=', $today],
                ['end', '>=', $today],
            ])
            ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
            ->join('package_scoops', 'packages.id', 'package_scoops.package_id')
            ->join('materials', function($join){
                $join->on('materials.part_id', '=', 'package_scoops.part_id')
                    ->on('materials.admin_id', '=', 'packages.admin_id');
            })
            ->leftJoin('course_parts', 'materials.part_id', '=', 'course_parts.id')
            ->leftJoin('part_chapters', 'materials.chapter_id', '=', 'part_chapters.id')
            ->select(['materials.*',
                'course_parts.title AS part_title', 'course_parts.id AS part_id',
                'part_chapters.title AS chapter_title', 'part_chapters.id AS chapter_id',
            ])
            ->get()
            ->map(function($row){
                $row->file_url = asset('storage/material/'.basename($row->file_url));
                $row->cover_url = asset('storage/material/'.basename($row->cover_url));
                return $row;
            })
            ->groupBy('part_id')
        );
    }

    public function hasMaterial(int $material_id){
        $today = Carbon::now();
        return (DB::table('subscriptions')
            ->where([
                ['user_id', '=', Auth::user()->id],
                ['start', '<=', $today],
                ['end', '>=', $today],
                ['materials.id', '=', $material_id]
            ])
            ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
            ->join('package_scoops', 'packages.id', 'package_scoops.package_id')
            ->join('materials', function($join){
                $join->on('materials.part_id', '=', 'package_scoops.part_id')
                    ->on('materials.admin_id', '=', 'packages.admin_id');
            })
            ->select(['materials.*',])
            ->first()
        );
    }
}
