<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\VisaController;

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
    return view('welcome');
});

Route::controller(AdminController::class)->middleware('admin:admin')->group(function(){
    Route::get('admin/login', 'LoginForm');
    Route::post('admin/login', 'store')->name('admin.login');
});

//admin dashboard
Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('auth:admin');

    Route::controller(JobApplicationController::class)->middleware('auth:admin')->group(function(){
        Route::get('jobs', 'index')->name('job.index');
        Route::get('jobs/create', 'create')->name('job.create');
        Route::post('jobs/store', 'store')->name('jobapp.store');
        Route::get('jobs/edit/{id}', 'edit')->name('job.edit');
        Route::post('jobs/update/{id}', 'update')->name('job.update');
        Route::get('jobs/view/{id}', 'viewjob')->name('job.view');
    });

    Route::controller(VisaController::class)->middleware('auth:admin')->group(function(){
        Route::get('/visa', 'index')->name('visa');
        Route::get('/visa/create', 'create')->name('visa.create');
        Route::post('/visa/create', 'store')->name('visa.store');
    });
});

//user dashboard
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
