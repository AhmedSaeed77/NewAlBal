<?php

namespace App\Http\Controllers\Users;

use App\Repository\Admin\PackageRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{

    private $packageRepository;

    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function index(){

        $materials = $this->packageRepository->userPackagesMaterials();

        return view('student.material')
            ->with(['materialsByPart' => $materials]);
    }

    public function preview($material_id){
        $file = $this->packageRepository->hasMaterial($material_id);
        if(!$file){
            return redirect()->route('student.dashboard')->with('error', 'Please Subscribe to access the content');
        }

        return response()->download(storage_path('app/'.$file->file_url), $file->title.'.'.pathinfo($file->file_url, PATHINFO_EXTENSION));
    }

}
