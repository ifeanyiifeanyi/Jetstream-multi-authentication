<?php

namespace App\Http\Controllers\Users;

use App\Models\Visa;
use App\Models\ManagePaymentType;
use Illuminate\Http\Request;
use Symfony\Polyfill\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProveOfPayments;
use App\Models\VisaApplication;
use Illuminate\Support\Facades\Auth;


class LatestVisaController extends Controller
{
    public function index()
    {
        $visas = DB::table('visas')->where('status', 'on')->get();
        // dd($visas);

        return view('profile.applications.visas.index', ['visas' => $visas]);
    }

    public function show($uuid)
    {
        $visa_requirements = DB::table('visas')->where('uuid', $uuid)->first();
        // dd($visa_requirements);
        return view('profile.applications.visas.show', ['visa_requirements' => $visa_requirements]);
    }
    public function apply($uuid)
    {
        $visa_application = DB::table('visas')->where('uuid', $uuid)->first();
        // dd($visa_application);
        return view('profile.applications.visas.apply', ['visa_application' => $visa_application]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dob' => 'required|date',
            'pob' => 'required|string',
            'full_name' => 'required|string',
            'passport_number' => 'required|string',
            'travel_dates' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'previous_travel' => 'nullable|date',
            'health_information' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'financial_support' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'academic_transcript' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'acceptance_letter' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'hotel_reservation' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
            'employment_contract' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
        ]);
        // dd($request->all());
        $data = $request->all();

        if($request->hasFile('employment_contract')){
            $employment = $request->file('employment_contract');
            $extension = $employment->getClientOriginalExtension();
            $employment_contract = time(). ".".$extension;
            $employment->move('employment_contract/', $employment_contract);
            $data['employment_contract'] = 'employment_contract/'.$employment_contract;
        }else {
            $data['employment_contract'] = NULL;
        }



        if($request->hasFile('hotel_reservation')){
            $hotel = $request->file('hotel_reservation');
            $extension = $hotel->getClientOriginalExtension();
            $hotel_reservation = time(). ".".$extension;
            $hotel->move('hotel_reservation/', $hotel_reservation);
            $data['hotel_reservation'] = 'hotel_reservation/'.$hotel_reservation;
        }else {
            $data['hotel_reservation'] = NULL;
        }



        if($request->hasFile('acceptance_letter')){
            $acceptance = $request->file('acceptance_letter');
            $extension = $acceptance->getClientOriginalExtension();
            $acceptance_letter = time(). ".".$extension;
            $acceptance->move('acceptance_letter/', $acceptance_letter);
            $data['acceptance_letter'] = 'acceptance_letter/'.$acceptance_letter;
        }else {
            $data['acceptance_letter'] = NULL;
        }


        if($request->hasFile('academic_transcript')){
            $academic = $request->file('academic_transcript');
            $extension = $academic->getClientOriginalExtension();
            $academic_transcript = time(). ".".$extension;
            $academic->move('academic_transcript/', $academic_transcript);
            $data['academic_transcript'] = 'academic_transcript/'.$academic_transcript;
        }else {
            $data['academic_transcript'] = NULL;
        }




        if($request->hasFile('financial_support')){
            $financial = $request->file('financial_support');
            $extension = $financial->getClientOriginalExtension();
            $financial_support = time(). ".".$extension;
            $financial->move('financial_support/', $financial_support);
            $data['financial_support'] = 'financial_support/'.$financial_support;
        }else {
            $data['financial_support'] = NULL;
        }




        if($request->hasFile('travel_dates')){
            $prove = $request->file('travel_dates');
            $extension = $prove->getClientOriginalExtension();
            $prove_payment = time(). ".".$extension;
            $prove->move('travel_dates/', $prove_payment);
            $data['travel_dates'] = 'travel_dates/'.$prove_payment;
        }else {
            $data['travel_dates'] = NULL;
        }




        if($request->hasFile('health_information')){
            $health = $request->file('health_information');
            $extension = $health->getClientOriginalExtension();
            $health_info = time(). ".".$extension;
            $health->move('health/', $health_info);
            $data['health_information'] = 'health/'.$health_info;
        }else {
            $data['health_information'] = NULL;
        }



        $data['uuid'] = Uuid::uuid_create();


        VisaApplication::create($data);
        return redirect()->route('visa.offers')->with('message', 'Your application has been created, please check your visa application page for more information');

    }

    public function showAppliedVisas()
    {

        $userId = Auth::user()->id;

        $visas =DB::table('visas')
        ->join('visa_applications', 'visas.id', '=', 'visa_applications.visa_applied_id')
        ->where('visa_applications.user_id', '=', $userId)
        ->select('visas.*','visa_applications.created_at as application_date','visa_applications.status as application_status','visa_applications.uuid as application_uuid', 'visa_applications.*')
        ->paginate(10);
            // dd($visas);
        return view('profile.applications.visas.status', ['visas' => $visas]);
    }
    public function manageVisaPayment($uuid){
        $payment_types = ManagePaymentType::latest()->get();
        $visas =DB::table('visas')
        ->join('visa_applications', 'visas.id', '=', 'visa_applications.visa_applied_id')
        ->where('visa_applications.uuid', '=', $uuid)
        ->select('visas.*','visa_applications.created_at as application_date','visa_applications.status as application_status','visa_applications.uuid as application_uuid', 'visa_applications.*')
        ->first();
            // dd($payment_types);
        return view('profile.applications.visas.payment', ['visas' => $visas, 'payment_types'=>$payment_types]);
    }

    public function visaPayment(Request $request){
        $request->validate([
            
            'payment_option_id' => 'required',
            'transaction_code' => 'required|string|unique:prove_of_payments',
            'prove_of_payment' => 'required|file|mimes:pdf,jpeg,jpg|max:20048',
        ]);

        if($request->hasFile('prove_of_payment')){
            $prove = $request->file('prove_of_payment');
            $extension = $prove->getClientOriginalExtension();
            $prove_payment = time(). ".".$extension;
            $prove->move('prove_of_payments/', $prove_payment);
            $prove_of_payment = 'prove_of_payments/'.$prove_payment;
        }

        $pay = new ProveOfPayments();
        $pay->user_id = $request->user_id;
        $pay->username = $request->username;
        $pay->user_email = $request->user_email;
        $pay->payment_option_id = $request->payment_option_id;
        $pay->transaction_code = $request->transaction_code;
        $pay->prove_of_payment = $prove_of_payment;
        $pay->save();
        return redirect()->route('visa.offers.status')->with('message', 'Your payment is being processed, please wait for more instructions ...');
    }
}
