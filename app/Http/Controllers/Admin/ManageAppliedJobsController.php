<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppliedJobs;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class ManageAppliedJobsController extends Controller
{
    public function index()
    {
        // $manageAppliedJobs = AppliedJobs::latest()->get();
        $manageAppliedJobs  = JobApplication::join('applied_jobs', 'job_applications.id', '=', 'applied_jobs.job_id')
            ->select('job_applications.*', 'applied_jobs.created_at AS applied_date', 'applied_jobs.*')
            ->get();
        // dd($manageAppliedJobs);
        return view('admin.manageJobs.index', ['manageAppliedJobs' => $manageAppliedJobs]);
    }
    public function show($id)
    {
        // $viewAppliedJob = JobApplication::findOrFail($id);
        $viewAppliedJob = JobApplication::join('applied_jobs', 'job_applications.id', '=', 'applied_jobs.job_id')
        ->join('job_categories', 'job_categories.id', '=', 'job_applications.category_id')
        ->select('job_applications.*','applied_jobs.created_at AS applied_date', 'applied_jobs.*', 'job_categories.name AS category_name')
        ->where('applied_jobs.job_id', $id)
        ->first();
        // dd($viewAppliedJob);
        return view('admin.manageJobs.show',['viewAppliedJob' => $viewAppliedJob]);
    }
}
