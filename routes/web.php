<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\ManageUserController;
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

    Route::controller(AdminController::class)->middleware('auth:admin')->group(function(){
        Route::post('admin/logout', 'destroy')->name('admin.logout');
    });

    Route::controller(JobApplicationController::class)->middleware('auth:admin')->group(function(){
        Route::get('jobs', 'index')->name('job.index');
        Route::get('jobs/create', 'create')->name('job.create');
        Route::post('jobs/store', 'store')->name('jobapp.store');
        Route::get('jobs/edit/{id}', 'edit')->name('job.edit');
        Route::post('jobs/update/{id}', 'update')->name('job.update');
        Route::get('jobs/view/{id}', 'show')->name('job.view');
        Route::delete('job/delete/{id}', 'destroy')->name('job.destroy');
    });

    Route::controller(JobCategoryController::class)->middleware('auth:admin')->group(function(){
        Route::get('categories', 'index')->name('job.category');
        Route::get('categories/edit/{id}', 'edit')->name('category.edit');
        Route::post('categories/update/{id}', 'update')->name('category.update');
        Route::post('categories', 'store')->name('category.store');
        Route::delete('categories/{id}', 'destroy')->name('category.destroy');
    });

    Route::controller(VisaController::class)->middleware('auth:admin')->group(function(){
        Route::get('/visa', 'index')->name('visa');
        Route::get('/visa/create', 'create')->name('visa.create');
        Route::get('/visa/details/{uuid}', 'show')->name('visa.show');
        Route::get('/visa/edit/{uuid}', 'edit')->name('visa.edit');
        Route::post('/visa/create', 'store')->name('visa.store');
        Route::post('/visa/update/{id}', 'update')->name('visa.update');
        Route::delete('/visa/delete/{uuid}', 'destroy')->name('visa.destroy');
    });

    Route::controller(ManageUserController::class)->middleware('auth:admin')->group(function(){
        Route::get('admin/users', 'index')->name('manage.user');
        Route::delete('admin/users/{id}', 'destroy')->name('delete.user');
    });
});

//user dashboard
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
