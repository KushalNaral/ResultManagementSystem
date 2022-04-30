<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Programme;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function userProfile(User $user , $branch , $semester , $id)
    {

        $students = User::where('id', $id)->first();
        $branch = Programme::where('branch' , $branch)->first();

        //TODO fix errors as response
        //TODO fix programme ans semester inside students --DONE

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
                            return $response = [ 'Error' => "Student doesnt exist"];
                        }
            }
                else
                {
                    return $response = [ 'Error' => "Semester doesnt exist"];
                }
        }
        else
        {
            return $response = [ 'Error' => "Program doesnt exist"];
        }



    }




    public function adminProfile(  $id, Admin $admin )
    {
        $admin = Admin::where('id' , $id)->first();

        if($admin)
        {       $admin->setAttribute('Api_info' , 'Admin Profile for admin no'." ".$id);

                return response($admin);
        }

        return $response = [ 'Error' => 'Admin not found'];

    }
}
