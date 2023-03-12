<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::user()->id;

        $visaApplicationsCount = DB::table('visas')
            ->join('visa_applications', 'visas.id', '=', 'visa_applications.visa_applied_id')
            ->where('visa_applications.user_id', '=', $userId)
            ->count();

        $jobApplicationsCount = DB::table('job_applications')
            ->join('applied_jobs', 'job_applications.id', '=', 'applied_jobs.job_id')
            ->where('applied_jobs.user_id', '=', $userId)
            ->count();

        $jobs = DB::table('job_applications')
            ->where('status', 1)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        $visas = DB::table('visas')
            ->where('status', 'on')
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('dashboard', ['visaApplicationsCount' => $visaApplicationsCount, 'jobApplicationsCount' => $jobApplicationsCount, 'jobs' => $jobs, 'visas' => $visas]);
    }
}
