<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class JobApplicationController extends Controller
{
    public function index(){
        $jobs = JobApplication::withCount('appliedJobs')->latest()->get();
        return view('admin.jobs.index', ['jobs' => $jobs]);
    }
    public function create(){
        $categories  = JobCategory::all();
        return view('admin.jobs.create', ['categories' => $categories]);
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'title' => 'required|string|min:5|max:199',
            'company' => 'required|string|min:5|max:199',
            'type' => 'required|string|min:5|max:199',
            'location' => 'required|string|min:5|max:199',
            'skills' => 'required|string|min:5',
            'salary' => 'required|numeric|min:0',
            'email' => 'required|email|unique:job_applications',
            'number_requires' => 'required|numeric|min:0',
            'requirements' => 'required|min:10',
            'description' => 'required|min:10',
            'others' => 'nullable|string',
            'category_id' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $jobs = new JobApplication();
        if($request->hasFile('image')){
            $thumb = $request->file('image');
            $extension = $thumb->getClientOriginalExtension();
            $image_file = time(). ".".$extension;
            $thumb->move('uploads/images/', $image_file);
            $jobs->image = 'uploads/images/'.$image_file;
        }else{
            $jobs->image = NULL;
        }
        $jobs->title = $request->title;
        $jobs->company = $request->company;
        $jobs->type = $request->type;
        $jobs->location = $request->location;
        $jobs->skills = $request->skills;
        $jobs->salary = $request->salary;
        $jobs->email = $request->email;
        $jobs->number_requires = $request->number_requires;
        $jobs->requirements = $request->requirements;
        $jobs->description = $request->description;
        $jobs->others = $request->others;
        $jobs->category_id = $request->category_id;
        $jobs->status = $request->status ? 1 : 0;
        $jobs->save();
        $notification = [
            'message'   => 'Job Created!',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.index')->with($notification);
    }
    public function edit($id){
        $job = JobApplication::findOrFail($id);
        $categories  = JobCategory::all();
        return view('admin.jobs.edit', ['job' => $job, 'categories' => $categories]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:199',
            'company' => 'required|string|min:5|max:199',
            'type' => 'required|string|min:5|max:199',
            'location' => 'required|string|min:5|max:199',
            'skills' => 'required|string|min:5|max:199',
            'salary' => 'required|numeric|min:0',
            'email' => 'required|email',
            'number_requires' => 'required|numeric|min:0',
            'requirements' => 'required|min:10|max:255',
            'description' => 'required|min:10|max:199',
            'others' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $job = JobApplication::findOrFail($id);
        if ($request->hasFile('image')) {
            $old_image = $job->image;
            if (File::exits($old_image)) {
                File::delete($old_image);
            }
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_file = time(). ".".$extension;
            $image->move('uploads/images/', $image_file);
            $job->image = 'uploads/images/'.$image_file;
        }
        $job->title = $request->title;
        $job->company = $request->company;
        $job->type = $request->type;
        $job->location = $request->location;
        $job->skills = $request->skills;
        $job->salary = $request->salary;
        $job->email = $request->email;
        $job->number_requires = $request->number_requires;
        $job->requirements = $request->requirements;
        $job->description = $request->description;
        $job->others = $request->others;
        $job->category_id = $request->category_id;
        $job->status = $request->status ? 1 : 0;
        $job->save();
        $notification = [
            'message'   => 'Job Updated!',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.index')->with($notification);
    }

    public function show($id){
        $job = JobApplication::findOrFail($id);
        return view('admin.jobs.view', ['job' => $job]);
    }
    public function destroy($id)
    {
        JobApplication::findOrFail($id)->delete();
        $notification = [
            'message'   => 'Job Template Deleted!',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.index')->with($notification);
    }
}
