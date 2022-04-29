<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = ['message' =>  'index function'];
        return response($response, 200);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = ['message' =>  'store function'];
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $students = User::all();
        return $students;
    }

    public function register()
    {
        return view('/register');
    }

    public function login()
    {
        return view('/login');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Students $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $response = ['message' =>  'update function'];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $response = ['message' =>  'destroy function'];
        return response($response, 200);
    }




}
