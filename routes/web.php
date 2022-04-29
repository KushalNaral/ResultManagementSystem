<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Mail\ResultPublishMail;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


/*//for api hashing
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/send-mail/',function ()
{
   Mail::to('newuser@example.com')->send(new ResultPublishMail());
   return 'The test mail for mailtrap has been sent';
});



//for homepage
Route::get('/', [HomeController::class, 'index']);
Route::get('/rms/register', [StudentsController::class, 'register']);
Route::get('/rms/login', [StudentsController::class, 'login']);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
