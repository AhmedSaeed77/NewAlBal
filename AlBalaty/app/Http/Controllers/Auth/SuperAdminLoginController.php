<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SuperAdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:super-admin'); // logged in superAdmin cant access
        $this->middleware('guest:admin'); // logged in admin cant access
        $this->middleware('guest'); // logged in user cant access
    }

    public function showLoginForm()
    {
        return view('auth.super-admin-login');
    }

    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        //attempt to log the user in
        if( Auth::guard('super-admin')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember) )
        {
            // if successful, then redirect to thier intended location
            return redirect()->intended(route('super-admin.dashboard'));
        }
        
        // if unsuccessful, then redirect back to the login with the form data\

        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
