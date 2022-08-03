<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UpersonsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DevController;

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('home');
});
*/
Route::controller(MainController::class)->group(function(){

    Route::get('/', 'index');
    Route::post('/check_nik', 'check_nik');
    Route::get('view/{nik}/information', 'data_information');
    Route::post('/check_in', 'check_in');
    Route::get('outer_report', 'outer_report');

});

Route::controller(DashboardController::class)->group(function(){
    Route::get('dashboard', 'index')->middleware('auth');
    Route::get('report/{date}', 'report')->middleware('auth');
    Route::post('all_report/{date}', 'allreport')->middleware('auth');
    Route::post('all_report_search', 'allreportSearch')->middleware('auth');
});

Route::controller(UpersonsController::class)->group(function(){

    Route::get('employee', 'index')->middleware('auth');
    Route::get('create_employee', 'create')->middleware('auth');
    Route::post('create_employee', 'store')->middleware('auth');
    Route::get('detail_employee/{id}', 'show')->middleware('auth');
    Route::post('acc_employee', 'accept')->middleware('auth');
    Route::post('disable_employee', 'disable')->middleware('auth');
    Route::post('enable_employee', 'enable')->middleware('auth');

});

Route::controller(CompanyController::class)->group(function(){

    Route::get('company', 'index')->middleware('auth');
    Route::get('show_company/{id}', 'show')->middleware('auth');
    Route::post('update_company', 'update')->middleware('auth');
    Route::post('delete_company', 'delete')->middleware('auth');
    Route::get('create_company', 'create')->middleware('auth');
    Route::post('create_company', 'store')->middleware('auth');
    Route::get('company/{id}/edit', 'edit')->middleware('auth');

});

Route::controller(LevelController::class)->group(function(){

    Route::get('level', 'index')->middleware('auth');
    Route::post('level_delete', 'delete')->middleware('auth');
    Route::post('new_level', 'store')->middleware('auth');

});

Route::controller(UserController::class)->group(function(){

    Route::get('user', 'index')->middleware('auth');
    Route::get('create_user', 'create')->middleware('auth');
    Route::post('create_user', 'store')->middleware('auth');
    Route::get('user/{id}/edit', 'show')->middleware('auth');

});

Route::controller(ProfileController::class)->group(function(){
    Route::get('profile', 'index')->middleware('auth');
    Route::post('profile', 'update')->middleware('auth');
});

Route::controller(LoginController::class)->group(function(){

    Route::get('login', 'index')->name('login')->middleware('guest');
    Route::post('login', 'authenticate');
    Route::post('logout', 'logout');

});

Route::controller(DevController::class)->group(function(){
    Route::get('developers', 'index');
});
