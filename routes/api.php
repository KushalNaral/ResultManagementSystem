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

    Route::group(['middleware' => ['cors', 'json.response']], function () use ($id) {
        //public routes

        Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
        Route::post('/register', [RegisterController::class, 'create'])->name('register.api');
        Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
        Route::get('/all', [StudentsController::class, 'show']);

        //individual student path
        Route::get("/student/{{$id}}", [StudentsController::class, 'individual']);
    });


    Route::middleware('auth:api')->group(function () {
        // protected routes


    });


