<?php


namespace App\Http\Controllers\Visitor;


use App\Http\Controllers\Controller;
use App\Models\Auth\Admin;
use App\Models\Library\CoursePart;
use App\Models\Library\Path;
use App\Models\Library\PathCourse;
use App\Repository\Admin\PackageRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PHPUnit\Util\RegularExpression;

class PublicController extends Controller
{
    public $packageRepository;

    /**
     * PublicController constructor.
     * @param PackageRepositoryInterface $packageRepository
     */
    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }


    /**
     * @param $path_id
     * @return Factory|View
     */
    public function packagesCatalog($path_id){
        $path = Path::find($path_id);
        if(!$path)
        {
            return redirect()->route('index');
        }

        return view('public.packages-catalog')
            ->with('path', $path);
    }


    /**
     * @param Request $request
     * @return array
     */
    public function packageCatalogFilterOptions(Request $request){

        $courses = PathCourse::query()
            ->where('path_id', $request->path_id)
            ->join('course_parts', 'path_courses.id', '=', 'course_parts.course_id')
            ->leftJoin('package_scoops', 'package_scoops.part_id', 'course_parts.id')
            ->select('path_courses.title AS course_title', 'path_courses.id AS course_id', 'course_parts.id AS part_id', 'course_parts.title AS part_title', 'path_courses.z_index')
            ->orderBy('path_courses.z_index')
            ->groupBy('course_parts.id')
            ->get();

        $teachers = Admin::query()
            ->join('packages', 'packages.admin_id', '=', 'admins.id')
            ->groupBy('admins.id')
            ->select(['admins.name', 'admins.id', DB::raw('COUNT(*) AS admin_package_count')])
            ->get();



        return response()->json([
            'courses'   => $courses->groupBy('course_id')->sortBy('z_index')->values()->all(),
            'data'      => $courses,
            'teachers'  => $teachers,
        ], 200);
    }

    public function packageQuery(Request $request){

        $packages = $this->packageRepository->packagesQuery($request);

        return response()->json([
            'packages' => $packages[0],
            'data'      => $packages[1],
            'request'   => $packages[2],
        ], 200);
    }
}
