<?php

namespace App\Http\Controllers\Users;

use App\Repository\Admin\PackageRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserPackages;
use DB;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{

    public $packageRepository;

    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }


    public function index(){

        $userPartsByPackage = ($this->packageRepository->getCurrentUserPackages());

        return view('student.courses')
            ->with('userPartsByPackage', $userPartsByPackage);
    }
}
