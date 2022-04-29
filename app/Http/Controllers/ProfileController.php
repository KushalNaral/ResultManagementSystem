<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\Students;

class ProfileController extends Controller
{
    public function profile(Students $students , $branch , $semester , $id)
    {

        $students = Students::where('id', $id)->first();
        $branch = Programme::where('branch' , $branch)->first();
        $semester = Programme::where('semester' , $semester)->first();


        if($branch)
        {
            if($semester)
            {
                    if($students)
                        {

                        $student_info = [
                                    'programme' => $branch['branch'],

                                 [
                                     'semester' => $semester['semester'],
                                     [
                                         'student_info' => $students
                                     ]
                                 ]
                            ];
                            return response($student_info);
                        }

                    else
                        {
                            return response("Student doesnt exist");
                        }

            }
                else
                {
                    return response("Semester doesnt exist");

                }
        }
        else
        {
            return response("Program doesnt exist");

        }



    }
}
