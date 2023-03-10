<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visa;
use Illuminate\Http\Request;
use Symfony\Polyfill\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visas =Visa::latest()->get();
        // dd($visas);
        return view('admin.visa.index', ['visas' => $visas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.visa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'visa_name' => 'required|string|min:5|max:255',
            'description' => 'required|string'
        ]);

        $data = $request->all();
        $data['uuid'] = Uuid::uuid_create();
        Visa::create($data);

        return redirect()->route('visa')->with('message', 'Visa Application Rules Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $visa = DB::table('visas')->where('uuid',$uuid)->first();
        
        return view('admin.visa.view', ['visa' => $visa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $visa = DB::table('visas')->where('uuid',$uuid)->first();
        
        return view('admin.visa.edit', ['visa' => $visa]);
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
            'visa_name' => 'required|string|min:5|max:255',
            'description' => 'required|string'
        ]);

        Visa::findOrFail($id)->update($request->all());
        return redirect()->route('visa')->with('message', 'Visa Application Rules Updated!');

        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        DB::table('visas')->where('uuid', $uuid)->delete();
        $notification = [
            'message'   => 'Visa Template Deleted!',
            'alert-type' => 'success'
        ];
        return redirect()->route('visa')->with($notification);
    }
}
