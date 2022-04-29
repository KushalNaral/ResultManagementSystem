<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Inertia\Testing\Concerns\Has;
use mysql_xdevapi\Table;

class ApiAuthController extends Controller
{

    //register method

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:students|max:255',
            'password' => 'required|min:6|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',

        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        if($request['password'] == $request['password_confirmation'])
        {
            $regStudents = new User();

            $regStudents['name'] = $request['name'];
            $regStudents['email'] = $request['email'];
            $regStudents['address'] = $request['address'];
            $regStudents['phone_number'] = $request['phone_number'];
            $regStudents['password'] = Hash::make($request['password']);
            $regStudents['password_confirmation'] = Hash::make($request['password_confirmation']);
            $regStudents['remember_token']   = Str::random(40);
            $regStudents->save();


            $token = $regStudents->createToken('Student has been registered successfully')->accessToken;

            $response = ['token' => $token];
            return response($response , 200);
        }
        else
        {
            return response(['errors' => 'The password doesnt match'], 422);
        }
    }


    //login function

    public function login(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|email|string|max:255',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }


        $email = $request->input('email');

        $students =User::where('email', $email)->first();
        $password = $request->input('password');


    if($students){

        if (Hash::check($password, $students->password_confirmation)) {

            $token = $students->createToken('Student has been logged in successfully')->accessToken;

            $loginToken = Str::random(44);

            $students = ['token' => $token, 'loginToken' => $loginToken];

            return response($students, 200);
        }
        else{

            return  $response = ['message' => 'Invalid Password Provided'];

        }

    }
    else
    {   $response = 'Student does not exist';
        return $response;
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

    //api key matching

}
