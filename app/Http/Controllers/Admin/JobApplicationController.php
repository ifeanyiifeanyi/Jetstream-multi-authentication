<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(){
        return view('admin.jobs.index');
    }
    public function create(){
        return view('admin.jobs.create');
    }
}
