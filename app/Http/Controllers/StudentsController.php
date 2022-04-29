<?php

namespace App\Http\Controllers;

use App\Models\Students;
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
     * @param Students $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        $students = Students::all();

//        $response = ['message' =>  'show function'];
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

    public function individual(Students $students, Request $request, $id)
    {
     return   $students = Students::where('student_id' == $id)->get();

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Students $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        $response = ['message' =>  'update function'];
        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Students $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        $response = ['message' =>  'destroy function'];
        return response($response, 200);
    }




}
