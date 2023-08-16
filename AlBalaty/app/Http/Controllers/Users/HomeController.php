<?php

namespace App\Http\Controllers\Users;

use App\Repository\Admin\PackageRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Library\CoursePart;
use App\UserPackages;
use App\Models\Package\PackageScoop;
use Auth;
use DB;

class HomeController extends Controller
{
    public $packageRepository;

    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function index(){

        $userPartsByPackage = ($this->packageRepository->getCurrentUserPackages());

        $partsCount = 0;
        foreach($userPartsByPackage as $package){
            $partsCount += $package->count();
        }
       
        return view('student.index')
            ->with('userPartsByPackage', $userPartsByPackage)
            ->with('partsCount', $partsCount)
            ->with(['success', 'jdsj']);
    }

}
