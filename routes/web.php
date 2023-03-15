<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\VisaController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\Users\LatestJobController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Users\LatestVisaController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\ManageAppliedJobsController;
use App\Http\Controllers\Admin\ManagePaymentTypeController;

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
Route::get('link', function(){
    Artisan::call('storage:link');
});
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
        Route::get('admin/jobs', 'index')->name('job.index');
        Route::get('admin/jobs/create', 'create')->name('job.create');
        Route::post('admin/jobs/store', 'store')->name('jobapp.store');
        Route::get('admin/jobs/edit/{id}', 'edit')->name('job.edit');
        Route::post('admin/jobs/update/{id}', 'update')->name('job.update');
        Route::get('admin/jobs/view/{id}', 'show')->name('job.view');
        Route::delete('admin/job/delete/{id}', 'destroy')->name('job.destroy');
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

    Route::controller(ManageAppliedJobsController::class)->middleware('auth:admin')->group(function(){
        Route::get('admin/appliedjobs', 'index')->name('manage.appliedjobs');
        Route::get('admin/appliedjobs/{id}', 'show')->name('manage.appliedjobs.show');
        Route::post('admin/appliedjobs/{job_token}', 'updateApplicationStatus')->name('manage.appliedjobs.status');
        Route::delete('admin/appliedjobs/{job_token}', 'destroy')->name('manage.appliedjobs.destroy');
    });

    Route::controller(ManagePaymentTypeController::class)->middleware('auth:admin')->group(function(){
        Route::get('admin/manage_payments', 'index')->name('manage.payments');
        Route::post('admin/manage_payments', 'store')->name('manage.payments.store');
        Route::get('admin/manage_payments/edit/{id}', 'edit')->name('manage.payments.edit');
        Route::put('/admin/manage_payment/update/{id}', 'store')->name('manage.payments.update');
        Route::delete('/admin/manage_payment/delete/{id}', 'destroy')->name('manage.payments.destroy');
    });
});

//user dashboard
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
    // Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::controller(LatestJobController::class)->group(function(){
        Route::get('jobs', 'index')->name('latest.job');
        Route::get('jobs/{id}', 'show')->name('latest.job.show');
        Route::get('jobs/apply/{id}', 'apply')->name('latest.job.apply');
        Route::post('jobs/applied', 'store')->name('latest.job.store');
        Route::get('user/jobs/status', 'showAppliedJobs')->name('job.applied');
    });

    Route::controller(LatestVisaController::class)->group(function(){
        Route::get('visa-offers', 'index')->name('visa.offers');
        Route::get('visa-requirements/{uuid}', 'show')->name('visa.offers.show');
        Route::get('visa-application/{uuid}', 'apply')->name('visa.offers.apply');
        Route::post('visa-application', 'store')->name('visa.offers.store');
        Route::get('visa-offer/status', 'showAppliedVisas')->name('visa.offers.status');
        Route::get('visa-management/status/{uuid}', 'manageVisaPayment')->name('visa.offers.payment');
        Route::post('visa-payment', 'visaPayment')->name('visa.payment');
    });
});
