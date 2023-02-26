<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class LatestJobController extends Controller
{
    public function index()
    {
        $jobs = JobApplication::latest()->paginate(10);
        return view('profile.applications.jobs.index', ['jobs' => $jobs]);
    }
    public function show($id){
        $job = JobApplication::findOrFail($id);
        return view('profile.applications.jobs.show', ['job' => $job]);
    }
}
