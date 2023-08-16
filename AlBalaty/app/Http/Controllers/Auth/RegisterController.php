<?php

namespace App\Http\Controllers\Auth;

use App\Localization\Locale;
use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm(Locale $locale)
    {
        return view('auth.auth_register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        \Session(['process' => 'register']);

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|unique:disabled_users',
            'password' => 'required|string|min:6|confirmed',
            //'country' => 'required|string',
            //'city' => 'required|string',
            'phone' => 'required|numeric|unique:users|unique:disabled_users',
            //'date'=>'required',
            //'path' => 'required',
            //'course' =>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'country' => $data['country'],
           // 'city' => $data['city'],
            'phone' => $data['phone'],
            'last_login' => date('Y-m-d H:i:s'),
            'last_ip' => getenv('REMOTE_ADDR'),
            'last_action' => 'loged in',
            //'path_id' => $data['path'],
            //'course_id' => $data['course'],
            //'brith_date' => $data['date'],
        ]);
        
        $i = [
            'name' => $data['name'],
            'id' => $user->id,
            'hash' => Hash::make($user->password),
        ];

        Mail::to($data['email'])->send(new Welcome($i));

        $detail = \App\UserDetail::where('user_id', $user->id)->get()->first();
        if(!$detail){
            $detail = new \App\UserDetail;
            
        }

        $detail->user_id = $user->id;
        $detail->save();



        \Session(['attempt_user_id' => $user->id]);    

        return $user;
        
        

    }

    public function register(\Illuminate\Http\Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
//        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(\Illuminate\Http\Request $request, $user)
    {

//        $disUser = new \App\DisabledUser;
//        $disUser->user_id = $user->id;
//        $disUser->name = $user->name;
//        $disUser->email = $user->email;
//        $disUser->city = $user->city;
//        $disUser->country = $user->country;
//        $disUser->phone = $user->phone;
//        $disUser->last_login = $user->last_login;
//        $disUser->last_action = $user->last_action;
//        $disUser->last_ip = $user->last_ip;
//        $disUser->password = $user->password;
//        $disUser->remember_token = $user->remember_token;
//
//        $disUser->path_id = $user->path_id;
//        $disUser->course_id = $user->course_id;
//        $disUser->brith_date = $user->brith_date;
//
//        $disUser->created_at = $user->created_at;
//        $disUser->updated_at = $user->updated_at;
//
//        $disUser->save();
//        $user->delete();
//        return \Redirect::to(route('login'))->with('success', 'Please Confirm you account by clicking the link sent to you email.');
        return redirect()->route('login')->with('success', 'Registration Completed, Please Login');
    }
}
