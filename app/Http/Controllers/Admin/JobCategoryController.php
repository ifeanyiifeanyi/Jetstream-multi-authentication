<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = null;
        $categories = JobCategory::latest()->get();
        return view('admin.jobCategory.index', ['categories' => $categories, 'category' => $category]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:50|unique:job_categories'
        ]);
        $category = new JobCategory();
        $category->name = $request->name;
        $category->status = $request->status ? 1 : 0;
        $category->save();
        $notification = [
            'message'   => 'Job Category created!',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.category')->with($notification);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = JobCategory::findOrFail($id);
        $categories = JobCategory::latest()->get();
        return view('admin.jobCategory.index', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:50'
        ]);
        $category = JobCategory::findOrFail($id);
        $category->name = $request->name;
        $category->status = $request->status ? 1 : 0;
        $category->save();
        $notification = [
            'message'   => 'Job Category Updated!',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobCategory::findOrFail($id)->delete();
        $notification = [
            'message'   => 'Job Category Deleted!',
            'alert-type' => 'success'
        ];
        return redirect()->route('job.category')->with($notification);
    }
}
