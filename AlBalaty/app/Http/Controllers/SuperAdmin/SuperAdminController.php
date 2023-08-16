<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:super-admin');
    }


    public function statics_query(Request $req){


        $product_details = explode('_', $req->product);
        $product = $product_details[0];
        $product_id = $product_details[1];
        $product_price = '--';

        if($product == 'p'){ // Package
            $payments = DB::table('packages')
                ->where(function($query)use($product_id){
                    if($product_id != 'all'){
                        return $query->where('packages.id', $product_id);
                    }
                })
                ->where('path_id', $req->path_id)
//                ->join('payment_approve_histories', 'packages.id', '=', 'payment_approve_histories.package_id')
                ->join('transaction_payments', 'transaction_payments.package_id', '=', 'packages.id')
                ->where('transaction_payments.status', '=', 'done')
                ->join('users', 'transaction_payments.user_id', '=', 'users.id')
                ->select(
                    'transaction_payments.*',
                    DB::raw('(packages.name) AS product_name'),
                    DB::raw('(users.name) AS user_name')
                )
                ->get();


            if($product_id != 'all'){
                $product_price = DB::table('packages')
                    ->where('id', $product_id)
                    ->first()->price;
            }

        }elseif($product == 'e'){ // Event
            $payments = DB::table('events')
                ->where(function($query)use($product_id){
                    if($product_id != 'all'){
                        return $query->where('events.id', $product_id);
                    }
                })
                ->where('course_id', $req->course_id)
                ->join('event_user', 'events.id', '=', 'event_user.event_id')
                ->join('payments', 'event_user.payment_id', '=', 'payments.id')
                ->where('payments.complete', '=', 1)
                ->join('users', 'payments.user_id', '=', 'users.id')
                ->select(
                    'payments.*',
                    DB::raw('(events.name) AS product_name'),
                    DB::raw('(users.name) AS user_name')
                )
                ->get();

            if($product_id != 'all'){
                $product_price = DB::table('events')
                    ->where('id', $product_id)
                    ->first()->price;
            }
        }


        if($req->year != 'all'){
            $payments = $payments->filter(function($payment) use($req){
                return \Carbon\Carbon::parse($payment->created_at)->year == $req->year;
            });
        }

        if($req->month != 'all'){
            $payments = $payments->filter(function($payment) use($req){
                return \Carbon\Carbon::parse($payment->created_at)->month == $req->month;
            });
        }



        return response()->json([
            'payments'          => $payments,
            'product_price'     => $product_price,
            'payments_no'       => count($payments),
        ], 200);

    }


    public function statics_index($path_id){
        return view('super-admin.statics')
            ->with('path_id', $path_id);
    }

    public function allUsersIndex(){
        $users = \App\Models\Auth\User::orderBy('last_action','desc')->orderBy('created_at', 'desc')->paginate(25);
        return view('super-admin.users')->with('users', $users);
    }

    public function searchByEmail(){
        $users = \App\Models\Auth\User::where('email', 'LIKE', '%'.Input::get('email').'%' )
//            ->join('user_details', 'users.id', '=', 'user_details.user_id')
//            ->select('users.*', 'user_details.*', 'users.id')
            ->paginate(25);
        return view('super-admin.users')->with('users', $users)->with('email', Input::get('email'));

    }


    public function updateEmail(Request $req){
        $user = \App\Models\Auth\User::find($req->userId);

        if(!$user){
            return [(object)[
                'code' => 404,
                'error' => 'User Not Found !',
                'data' => [
                    'email' => $req->newEmailValue
                ]
            ]];
        }

        if($user->email == $req->newEmailValue){
            return [(object)[
                'code' => 200,
                'success' => 'Updated.',
                'data' => [
                    'email' => $req->newEmailValue
                ]
            ]];
        }

        $check = \App\Models\Auth\User::where('email', $req->newEmailValue)->get()->first();
        if($check){
            return [(object)[
                'code' => 500,
                'error' => 'Email Already Taken.',
                'data' => [
                    'email' => $user->email
                ]
            ]];
        }

        $user->email = $req->newEmailValue;
        $user->save();

        return [(object)[
            'code' => 200,
            'success' => 'Updated.',
            'data' => [
                'email' => $req->newEmailValue
            ]
        ]];
    }


    public function removeUserPackage($user_id,$package_id){

        $check = \App\UserPackages::where('user_id', $user_id)->where('package_id', $package_id)->get()->first();
        if($check){
            $d1 = DB::table('quizzes')
                ->where('user_id', $user_id)
                ->where('package_id', $package_id)
                ->select('quizzes.id')
                ->get()
                ->pluck(['id'])
                ->toArray();

            if(count($d1)){
                $d21 = DB::table('correct_answers')
                    ->whereIn('quiz_id', $d1)
                    ->delete();
                $d21 = DB::table('wrong_answers')
                    ->whereIn('quiz_id', $d1)
                    ->delete();
                $d22 = DB::table('active_answers')
                    ->whereIn('quiz_id', $d1)
                    ->delete();
            }

            $d3 = DB::table('quizzes')
                ->where('user_id', $user_id)
                ->where('package_id', $package_id)
                ->delete();


            DB::table('video_progresses')
                ->where('user_id', $user_id)
                ->where('package_id', $package_id)
                ->delete();

            $check->delete();
        }


        return back()->with('success', 'Package removed.');
    }


    public function removeUserEvent($user_id,$event_id){

        $check = \App\EventUser::where('user_id', $user_id)->where('event_id', $event_id)->get()->first();
        if($check){

            DB::table('video_progresses')
                ->where('user_id', $user_id)
                ->where('event_id', $event_id)
                ->delete();

            $check->delete();
        }


        return back()->with('success', 'Event removed.');
    }


    public function user_disable(Request $req, $user_id){
        $user = \App\Models\Auth\User::find($user_id);
        $disUser = new \App\DisabledUser;
        $disUser->user_id = $user->id;
        $disUser->name = $user->name;
        $disUser->email = $user->email;
        $disUser->city = $user->city;
        $disUser->country = $user->country;
        $disUser->phone = $user->phone;
        $disUser->last_login = $user->last_login;
        $disUser->last_action = $user->last_action;
        $disUser->last_ip = $user->last_ip;
        $disUser->password = $user->password;
        $disUser->remember_token = $user->remember_token;
        $disUser->created_at = $user->created_at;
        $disUser->updated_at = $user->updated_at;
        $disUser->save();
        $user->delete();
        return back()->with('success', 'User Disabled !');
    }


    public function user_enable(Request $req, $id){
        // $id is the field id in the table , not the user id
        $disabled = \App\DisabledUser::find($id);
        $user = new \App\User;
        $user->id = $disabled->user_id;
        $user->name = $disabled->name;
        $user->email = $disabled->email;
        $user->city = $disabled->city;
        $user->country = $disabled->country;
        $user->phone = $disabled->phone;
        $user->last_login = $disabled->last_login;
        $user->last_action = $disabled->last_action;
        $user->last_ip = $disabled->last_ip;
        $user->password = $disabled->password;
        $user->remember_token = $disabled->remember_token;
        $user->created_at = $disabled->created_at;
        $user->updated_at = $disabled->updated_at;
        $user->save();

        $disabled->delete();
        return back()->with('success', 'User Enabled !');
    }


    public function manual_add_package($user_id){
        $user = User::find($user_id);
        return view('super-admin.ManualAddPackage')->with('user', $user);
    }

    public function manual_add_package_post(Request $req){
        if($req->input('package_id') == 'null' || $req->input('package_id') == ''){
            return back()->with('error', 'Please, select a package !');
        }


        // create a virual payment
        $payment = new Payments;
        $payment->user_id = $req->input('user_id');
        $payment->totalPaid = \App\Models\Package\Packages::find($req->input('package_id'))->price;
        $payment->paypalEmail = \App\Models\Auth\User::find($req->input('user_id'))->email;
        $payment->paymentMethod = 'manual';
        $payment->complete = 1;
        $payment->save();

        // add to approve history
        $approve = new \App\PaymentApproveHistory;
        $approve->payment_id = $payment->id;
        $approve->package_id = $req->input('package_id');
        $approve->user_id = $req->input('user_id');
        $approve->save();

        // add to user_packages
        $user_package = new \App\UserPackages;
        $user_package->user_id = $req->input('user_id');
        $user_package->package_id = $req->input('package_id');
        $user_package->save();

        $package = \App\Models\Package\Packages::find($user_package->package_id);
        try{
            Mail::to(\App\Models\Auth\User::find($user_package->user_id)->email)->send(new \App\Mail\EnrollConfirmationMail($package->enroll_msg));
        }catch(\Exception $e){
            /**
             * do nothing !
             */
        }

        return back()->with('success', 'New Package has been added.');
    }



    public function manual_time_extends(Request $request){

        if($request->n_days <= 0){
            return response()->json([
                'message'   => 'Number of Days can not be negative !',
            ], 200);
        }

        if(!filter_var($request->n_days, FILTER_VALIDATE_INT)){
            return response()->json([
                'message'   => 'Number of Days must be Integer Value !',
            ], 200);
        }

        if($request->item_type == 'package'){
            $item = \App\Models\Package\Packages::where([
                'id' => $request->item_id
            ])->first();
            $user_item = \App\UserPackages::where([
                'user_id'       => $request->user_id,
                'package_id'    => $request->item_id,
            ])
                ->first();

        }elseif($request->item_type == 'event'){
            $item = \App\Event::where([
                'id' => $request->item_id
            ])->first();
            $user_item = \App\EventUser::where([
                'user_id'       => $request->user_id,
                'event_id'      => $request->item_id,
            ])
                ->first();

        }

        if($user_item){

            if($user_item->created_at){
                $user_item->created_at = \Carbon\Carbon::parse($user_item->created_at)
                    ->addDays($request->n_days);
            }else{
                $user_item->created_at = \Carbon\Carbon::now()
                    ->addDays($request->n_days);
            }
            $user_item->save();

            return response()->json([
                'message'   => 'Item Extended To : '.\Carbon\Carbon::parse($user_item->created_at)
                        ->addDays($item->expire_in_days),
            ], 200);

        }

        return response()->json([
            'message'   => 'Record not found !',
        ], 200);

    }




    public function searchByPackage(){
        $userPackage = \App\UserPackages::where('package_id','=', Input::get('package_id'))->get();
        $ids = [];
        foreach ($userPackage as $user){
            array_push($ids, $user->user_id);
        }

        $users = \App\Models\Auth\User::whereIn('id', $ids)->get();
        return view('super-admin.users')->with('users', $users)->with('package_id', Input::get('package_id'));

    }



    public function disabled_users_view(){
        return view('super-admin.disabled-users');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('super-admin.dashboard');
    }

}
