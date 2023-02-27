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
    public function apply($id){
        $job = JobApplication::findOrFail($id);
        return view('profile.applications.jobs.submit', ['job' => $job]);
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'user_id' => 'required',
            'job_id'    => 'required',
            'job_title' => 'required',
            'user_email' => 'required|email|exists:users,email',
            'user_name' => 'required|string|exists:users,name'
        ]);
    }
}
