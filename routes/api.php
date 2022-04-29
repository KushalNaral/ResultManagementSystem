<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



    Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['middleware' => ['cors', 'json.response']], function ()
    {
        //public routes

        Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
        Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
        Route::post('/register', [ApiAuthController::class, 'register'])->name('register.api');

        //login

//        Route::post('/rms/login', function (Request $request) {
//
//            if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
//
//                $student = auth()->user();
//                $student->api_token = str_random(60);
//                $student->save();
//                return $student;
//            }
//
//            return response()->json([
//                'error' => 'Unauthenticated user',
//                'code' => 401,
//            ], 401);
//        })->name('login.api');








//    Route::get('/rd', [ApiAuthController::class, 'register']);

        Route::get('/all', [StudentsController::class, 'show']);

        //individual student path

    });





    Route::middleware('auth:api')->group(function () {
        // protected routes


    });


