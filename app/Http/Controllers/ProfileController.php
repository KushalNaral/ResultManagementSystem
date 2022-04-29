<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(User $user , $branch , $semester , $id)
    {

        $students = User::where('id', $id)->first();
        $branch = Programme::where('branch' , $branch)->first();
        $semester = Programme::where('semester' , $semester)->first();

        //TODO fix errors as response
        //TODO fix programme ans semester inside students

        if($branch)
        {
            if($semester)
            {
                    if($students)
                        {
                            $students->setAttribute('program' , $branch->branch);
                            $students->setAttribute('semester' , $branch->semester);


                            return response($students);
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
