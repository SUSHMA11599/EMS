<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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



Route::get('/', function () {
    return view('login');
});


Route::get("login",[loginController::class,'login'])->name('login-user');
Route::view('dashboard','userdashboard');

Route::view('forgotPass','forgotPassword');

Route::post('update',[forgotPasswordController::class,'updatePassword']);

Route::get('register', function(){
    return view('register');
});

Route::post('register', [RegisterController::class, 'getFormData']
);
