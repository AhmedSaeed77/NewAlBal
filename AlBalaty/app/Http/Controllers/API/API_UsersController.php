<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\OauthRefreshTokens as OauthTokens;

class API_UsersController extends Controller
{
    public function logout(){

        $accessToken = Auth::user()->token();
        if($accessToken){
            $query = OauthTokens::where('access_token_id', '=', $accessToken->id );
            if($query){
                $query->update([
                    'revoked' => true
                ]);

                $accessToken->revoke();

                return response()->json([
                    'meta' => [
                        'code' => 200,
                    ]
                ]);
            }else{
                return response()->json(null, 204);
            }
        }else{
            return response()->json(null, 204);
        }


    }

    public function new_user(Request $req){

        
        $this->validate($req, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'city' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
        ]);

        $new_user = User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => Hash::make($req->input('password')),
            'city' => $req->input('city'),
            'country' => $req->input('country'),
            'phone' => $req->input('phone'),
        ]);


        /** Success ! */
        return response()->json([
            'messge' => 'Account Created',
            'errors' => (object)[],
        ], 201);
    }
}
