<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use App\Models\AppliedJobs;
use Symfony\Polyfill\Uuid\Uuid;

class LatestJobController extends Controller
{
    public function index()
    {
        // $jobs = JobApplication::latest()->paginate(10);
        $jobs = JobApplication::whereNotIn('id', function($query) {
            $query->select('job_id')
                ->from('applied_jobs')
                ->where('user_id', auth()->user()->id);
        })->paginate(10);
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

        $applied_job = new AppliedJobs();

        if($request->hasFile('cv')){
            $cv = $request->file('cv');
            $extension = $cv->getClientOriginalExtension();
            $cv_file = time(). ".".$extension;
            $cv->move('resumes/', $cv_file);
            $applied_job->cv = 'resumes/'.$cv_file;
        }

        $applied_job->job_id  = $request->job_id;
        $applied_job->job_title  = $request->job_title;
        $applied_job->user_id  = $request->user_id;
        $applied_job->user_name  = $request->user_name;
        $applied_job->user_email  = $request->user_email;
        $applied_job->job_token  = Uuid::uuid_create();
        $applied_job->save();
        return redirect()->route('latest.job')->with('message', 'You have successfully applied for '.$request->job_title);
    }
}
