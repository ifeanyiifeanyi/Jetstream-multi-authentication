<?php

namespace App\Http\Controllers\Users;

use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LatestVisaController extends Controller
{
    public function index()
    {
        $visas = DB::table('visas')->where('status', 'on')->get();
        // dd($visas);

        return view('profile.applications.visas.index', ['visas' => $visas]);
    }

    public function show($uuid){
        $visa_requirements = DB::table('visas')->where('uuid', $uuid)->first();
        // dd($visa_requirements);
        return view('profile.applications.visas.show', ['visa_requirements' => $visa_requirements]);
    }
    public function apply($uuid){
        $visa_application = DB::table('visas')->where('uuid', $uuid)->first();
        // dd($visa_application);
        return view('profile.applications.visas.apply', ['visa_application' => $visa_application]);
    }
}
