<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Inertia\Testing\Concerns\Has;

class ApiAuthController extends Controller
{

    //register method

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:students|max:255',
            'password' => 'required|min:6|string|confirmed'

        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(12);

        $student = Students::create($request->toArray());

        $token = $student->createToken('Laravel Password Grant Client')->accessToken;

        $response = ['token' => $token];

        return response($response , 200);
    }


    //login function

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

           'email' => 'required|email|string|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $students  = Students::where('email', $request->email)->first();

        if($students){

            if( Hash::check($request->password , $students->password))
            {
                $token = $students->createToken('Laravel Password Grant Client')->accessToken;
                $reponse = [ 'token' => $token];
                return response($reponse, 200);
            }
            else
            {
                $reponse = ['message' => 'Invalid Password Provided'];
            }
        }
        else
        {
            $reponse = [ 'message' => 'Invalid User Provided'];
            return response($reponse, 422);
        }
    }


    //logout function

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been logged out'];
        return response($response, 200);
    }

}
