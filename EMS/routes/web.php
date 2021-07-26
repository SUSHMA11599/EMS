<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IssueController;

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


Route::get("login",[LoginController::class,'login'])->name('login-user');
Route::view('userDashboard','userDashboard');

Route::view('forgotPass','forgotPassword');

Route::post('update',[forgotPasswordController::class,'updatePassword']);

Route::get('register', function(){
    return view('register');
});

Route::post('register', [RegisterController::class, 'getFormData']
);

Route::get('issue',[IssueController::class,'submitIssue']);

Route::get('list',[IssueController::class,'getIssue']);


Route::view('eAddress','editAddress');
Route::view('eMobile','editMobile');

Route::post('updateMobile',[LoginController::class,'updateMobile']);

Route::post('updateAddress',[LoginController::class,'updateAddress']);