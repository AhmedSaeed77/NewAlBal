<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Auth\Admin;
use App\Models\Auth\Page;
use App\Models\Auth\PageAdmin;
use App\Models\Auth\Role;
use App\Models\Library\CoursePart;
use App\Models\Library\PartChapter;
use App\Models\Library\PathCourse;
use App\Models\Library\Path;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class TeacherManagerController extends Controller
{
    public $pagination = 20;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:super-admin')->except(['getPathCourses', 'register_teacher', 'getCourseParts', 'getPaths']);
    }

    public function register_teacher(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|min:3|max:50',
            'email' => 'email|unique:admins,email',
            'describtion' => 'required|min:3|max:50',
            'password' => 'required|confirmed|min:6',
            'phone'=>'required|unique:admins,phone',
        ]);

        DB::beginTransaction();
        try{
            $admin = new Admin();
            $admin->name=$req->name;
            $admin->email=$req->email;
            $admin->password=Hash::make($req->password);
            $admin->country=$req->country;
            $admin->phone=$req->phone;
            $admin->teachingLang=$req->lang;
            $admin->description=$req->describtion;
            $admin->save();

            $query = [];
            for($i=0 ; $i<count($req->path);$i++)
            {
                $part_id = $req->lesson[$i];
                $filtered = array_filter($query, function($row)use($part_id){
                    return $row['part_id'] == $part_id;
                });
                if(count($filtered) > 0){
                    continue;
                };
                array_push($query, [
                    'admin_id'=> $admin->id,
                    'path_id'=> $req->path[$i],
                    'course_id'=> $req->course[$i],
                    'part_id'=> $req->lesson[$i],
                    'content_full_access'=> 0,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ]);

            }

            DB::table('teacher_scoops')->insert($query);

        }catch(\Exception $e){
            DB::rollBack();
            throwException($e);
        }
        DB::commit();

        return redirect()->route('admin.login')->with('success', 'Registration Completed, Please Login.');
    }

    public function getPathCourses(){
        /** @var  $country_id == path_id */
        $country_id = request('country_id');
        $State = PathCourse::where('path_id', $country_id)->get();
        $optinion = '<option value="" disabled selected>الصف الدراسيه</option>';
        foreach ($State as $citys) {
            $optinion .= '<option value=" ' . $citys->id . '">' . $citys->title . '</option>';
        }
        return $optinion;
    }

    public function getPaths(){
        /** @var  $country_id == path_id */
        $country_id = request('country_id');
        $State = Path::where('country_id', $country_id)->get();
        $optinion = '<option value="" disabled selected>المراحل</option>';
        foreach ($State as $citys) {
            $optinion .= '<option value=" ' . $citys->id . '">' . $citys->title . '</option>';
        }
        return $optinion;
    }

    public function getCourseParts(){
        /** @var  $country_id  == course_id */
        $country_id = request('country_id');

        $parts = CoursePart::where('course_id', $country_id)->get();

        $optinion = '<option value="" disabled selected>الماده الدراسيه</option>';
        foreach ($parts as $citys) {
            $optinion .= '<option value=" ' . $citys->id . '">' . $citys->title . '</option>';
        }
        return $optinion;
    }

    public function getTeacherExams(Request $request){

        return $request->teachers ? DB::table('exams')
            ->join('admins', 'exams.admin_created_by', '=', 'admins.id')
            ->whereIn('admin_created_by', array_map(function($i){
                        return $i['id'];
                    }, $request->teachers))
            ->select(
                DB::raw('(exams.id) AS exam_id'),
                DB::raw('(exams.name) AS exam_name'),
                DB::raw('(admins.id) AS teacher_id'),
                DB::raw('(admins.name) AS teacher_name')
            )
            ->get(): [];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.teacher.create');
    }

    public function getRoles(Request $request){

        $managements = DB::table('roles')
            ->select('id', 'name')
            ->get();

        return response()->json($managements, 200);
    }

    public function getRolePages(Request $request){
        $pages_arr = [];
        $management = Role::find($request->role_id);
        $pages = Page::where('role_id', $request->role_id)->get();
        foreach($pages as $page){
            $i = (object)[];
            $i->page_id         = $page->id;
            $i->page            = $page->page;
            $i->management_id   = $management->id;
            $i->management      = $management->name;
            array_push($pages_arr, $i);
        }
        return $pages_arr;
    }

    public function store(Request $request){

        if(!$request->has('StorePermissionFlag')){

            if(strlen($request->password) < 8){
                return response()->json([
                    'error'     => 'Password must be longer then 8 characters',
                ], 200);
            }

            $admin = Admin::where('email', $request->email)->first();
            if($admin){
                return response()->json([
                    'error' => 'Email Already Exists.',
                ], 200);
            }
            $admin = Admin::where('phone', $request->phone)->first();
            if($admin){
                return response()->json([
                    'error' => 'Phone Number Already Exists.',
                ], 200);
            }

            $admin = Admin::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'country'       => $request->country,
                'phone'         => $request->phone,
                'gender'        => $request->gender,
            ]);

            return response()->json([
                'teacher_id'    => $admin->id,
                'error'         => '',
            ], 200);

        }else{
            // store Permissions
            $admin = Admin::find($request->teacher_id);
            if($request->permissions){
                foreach($request->permissions as $permission){
                    $this->AttachPermissions($admin, $permission['page_id'], range(1, $permission['permission']));
                }
            }

            if($request->has('teacher_courses')){
                if(is_iterable($request->teacher_courses)){
                    if(count($request->teacher_courses)){
                        $rows = [];
                        foreach($request->teacher_courses as $course){
                            array_push($rows, [
                                'admin_id'  => $request->teacher_id,
                                'path_id'   => $course['path_id'],
                                'course_id'   => $course['course_id'],
                                'part_id'   => $course['part_id'],
                                'content_full_access'   => 1, // comment to review
                                'created_at'    => Carbon::now(),
                                'updated_at'    => Carbon::now(),
                            ]);
                        }
                        DB::table('teacher_scoops')->insert($rows);
                    }
                }
            }
        }
    }

    /**
     * @param Admin $admin
     * @param $page_id
     * @param $permission_list
     */
    public function AttachPermissions(\App\Models\Auth\Admin $admin, $page_id ,$permission_list){

        foreach($permission_list as $permission){
            $admin->page_admin()->create([
                'page_id' => $page_id,
                'permission_id' => $permission,
                'is_granted' => 1,
            ]);
        }
    }

    public function getAdminPermissions(Request $request){
        /**
         * Permissions array
         */
        $permissions_arr = [];
        // [page_id, management_id, element_id:permission+page_id, permission, page, management]
        foreach(Role::all() as $role){
            foreach(Page::where('role_id', $role->id)->get() as $page){
                $permissions = PageAdmin::where('admin_id', $request->teacher_id)
                    ->where('page_id', $page->id)
                    ->where('is_granted', 1)
                    ->orderBy('permission_id', 'desc')->first();
                if($permissions){
                    $i = (object)[];
                    $i->page_id = $page->id;
                    $i->management_id = $role->id;
                    $i->element_id = 'permission'.$page->id;
                    $i->permission = $permissions->permission_id;
                    $i->page = $page->page;
                    $i->management = $role->name;
                    array_push($permissions_arr, $i);

                }
            }
        }

        /**
         * Load Teacher Scoop
         */
        $teacher_scoop = DB::table('teacher_scoops')
            ->where('admin_id', $request->teacher_id)
            ->join('paths', 'teacher_scoops.path_id', '=', 'paths.id')
            ->join('path_courses', 'teacher_scoops.course_id', '=', 'path_courses.id')
            ->join('course_parts', 'teacher_scoops.part_id', '=', 'course_parts.id')
            ->select(
                DB::raw('(path_courses.id) AS course_id'),
                DB::raw('(path_courses.title) AS course_title'),
                DB::raw('(paths.id) AS path_id'),
                DB::raw('(paths.title) AS path_title'),
                DB::raw('(course_parts.id) AS part_id'),
                DB::raw('(course_parts.title) AS part_title')
            )->get();

        return response()->json([
            'permissions' => $permissions_arr,
            'teacher_scoops' => $teacher_scoop,
        ], 200);
    }

    public function edit($id){
        $admin = Admin::find($id);
        return view('super-admin.teacher.edit')
            ->with('admin_id', $id)
            ->with('teacher', $admin);
    }

    public function update(Request $request, $id){

        if(!$request->has('StorePermissionFlag')){

            if($request->password != ''){
                if(strlen($request->password) < 8){
                    return response()->json([
                        'error'     => 'Password must be longer then 8 characters',
                    ], 200);
                }
            }

            $admin = Admin::where([
                    'email' => $request->email,
                ])
                ->where('id', '!=', $id)
                ->first();
            if($admin){
                return response()->json([
                    'error' => 'Email Already Exists.',
                ], 200);
            }
            $admin = Admin::where('phone', $request->phone)
                ->where('id', '!=', $id)
                ->first();
            if($admin){
                return response()->json([
                    'error' => 'Phone Number Already Exists.',
                ], 200);
            }

            $admin = Admin::find($id);
            if(!$admin){
                return response()->json(['error' => 'Teacher Not Found'], 200);
            }
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->country = $request->country;
            $admin->gender = $request->gender;
            if($request->password != ''){
                $admin->password = Hash::make($request->password);
            }
            $admin->save();

            return response()->json([
                'teacher_id'    => $admin->id,
                'error'         => '',
            ], 200);

        }else{
            // store Permissions
            $admin = Admin::find($request->teacher_id);
            DB::table('page_admin')->where('admin_id', $request->teacher_id)->delete();
            if($request->permissions){
                foreach($request->permissions as $permission){
                    $this->AttachPermissions($admin, $permission['page_id'], range(1, $permission['permission']));
                }
            }

            DB::table('teacher_scoops')
                ->where('admin_id', $request->teacher_id)
                ->delete();
            if($request->has('teacher_courses')){
                if(is_iterable($request->teacher_courses)){
                    if(count($request->teacher_courses)){
                        $rows = [];
                        foreach($request->teacher_courses as $course){
                            array_push($rows, [
                                'admin_id'  => $request->teacher_id,
                                'path_id'   => $course['path_id'],
                                'course_id'   => $course['course_id'],
                                'part_id'   => $course['part_id'],
                                'content_full_access'   => 1, // comment to review
                                'created_at'    => Carbon::now(),
                                'updated_at'    => Carbon::now(),
                            ]);
                        }
                        DB::table('teacher_scoops')->insert($rows);
                    }
                }
            }
        }
    }

    public function index(){
        $pagination = \request()->pagination;
        $name = \request()->name;
        $email = \request()->email;

        $teachers = DB::table('admins')
            ->where(function($query)use($name, $email){
                if($name){
                    $query->where('name', 'LIKE',  '%'.$name.'%');
                }
                if($email){
                    $query->where('email', 'LIKE', '%'.$email.'%');
                }
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($pagination ? $pagination: $this->pagination);

        return view('super-admin.teacher.index')
            ->with('teachers', $teachers);
    }


}
