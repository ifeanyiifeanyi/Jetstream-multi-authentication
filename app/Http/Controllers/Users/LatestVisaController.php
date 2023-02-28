<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Visa;
use Illuminate\Http\Request;

class LatestVisaController extends Controller
{
    public function index()
    {
        $visas = Visa::latest()->get();
        // dd($visas);

        return view('profile.applications.visas.index', ['visas' => $visas]);
    }
}
