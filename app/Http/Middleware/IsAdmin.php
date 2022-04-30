<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($id , Request $request)
    {

        $admin = Admin::where('id' , $id)->first();

        if($admin->isAdmin == '1')
        {
            return response('Is an Admin');
        }

        return response('Not an Admin');
    }
}
