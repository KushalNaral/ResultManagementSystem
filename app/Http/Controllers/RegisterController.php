<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    /**
     * @param  Request  $request
     * @return \App\User
     * */

    protected function create(Request $request)
    {

        return User::create([

           'name' => $request['name'],
           'email' => $request['email'],
           'password' => $request['password'],
           'password_confirmation' => $request['password_confirmation'],
            'api_token' => Str::random(30),
            'remember_token' => Str::random(30),

        ]);


    }
}
