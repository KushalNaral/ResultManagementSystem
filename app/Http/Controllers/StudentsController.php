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
        //
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Students
     */

    protected function create(array $data)
    {

       /* return Students::forceCreate([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'api_token' => Str::random(80),


        ]);*/

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Students $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Students $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Students $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        //
    }
}
