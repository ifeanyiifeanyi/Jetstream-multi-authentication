<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Validator;

class JobApplicationController extends Controller
{
    public function index(){
        return view('admin.jobs.index');
    }
    public function create(){
        return view('admin.jobs.create');
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'title' => 'required|string|min:5|max:199',
            'company' => 'required|string|min:5|max:199',
            'type' => 'required|string|min:5|max:199',
            'location' => 'required|string|min:5|max:199',
            'skills' => 'required|string|min:5|max:199',
            'salary' => 'required|numeric|min:0',
            'email' => 'required|email|unique:job_applications',
            'number_requires' => 'required|numeric|min:0',
            'requirements' => 'required|min:10|max:255',
            'description' => 'required|min:10|max:199',
            'others' => 'nullable|string',
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
        $jobs->status = $request->status ? 1 : 0;
        $jobs->save();
        $notification = [
            'message'   => 'Job Created!',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.index')->with($notification);
    }
}
