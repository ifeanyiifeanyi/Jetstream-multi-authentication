<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ManagePaymentType;
use App\Http\Controllers\Controller;

class ManagePaymentTypeController extends Controller
{
    public function index(){
        $payments = ManagePaymentType::latest()->get();
        
            
     
        return view('admin.visa.managePayment', ['payments' => $payments]);
    }

    public function edit($id)
    {
        $edit_payment = ManagePaymentType::findOrFail($id);
        $payments = ManagePaymentType::latest()->get();

        return view('admin.visa.managePayment', ['payments' => $payments, 'edit_payment' => $edit_payment]);
        
    }

    public function store(Request $request, $id = null){

        if($request->isMethod('post')){
            $request->validate([
                'payment_type' => 'required|string|min:3|max:199',
                'payment_name' => 'required|string|min:3|max:199',
                'payment_account' => 'required|string|min:3|max:199',
            ]);

            $payment = new ManagePaymentType();
            $payment->payment_type = $request->payment_type;
            $payment->payment_name = $request->payment_name;
            $payment->payment_account = $request->payment_account;
            $payment->status = $request->status ? 1 : 0;
            $payment->save();
            $notification = [
                'message'   => 'Payment Method Created!',
                'alert-type' => 'success'
            ];
            return redirect()->route('manage.payments')->with($notification);

            
        }else if($request->isMethod('put') || $request->isMethod('patch')) {
            $request->validate([
                'payment_type' => 'required|string|min:3|max:199',
                'payment_name' => 'required|string|min:3|max:199',
                'payment_account' => 'required|string|min:3|max:199',
            ]);
            
            
            $payment = ManagePaymentType::findOrFail($id);
            $payment->payment_type = $request->payment_type;
            $payment->payment_name = $request->payment_name;
            $payment->payment_account = $request->payment_account;
            $payment->status = $request->status ? 1 : 0;
            $payment->save();

            $notification = [
                'message'   => 'Payment Method Updated!',
                'alert-type' => 'success'
            ];
            return redirect()->route('manage.payments')->with($notification);
        }

    }
    public function destroy($id)
    {
        ManagePaymentType::findOrFail($id)->delete();
        $notification = [
            'message'   => 'Payment Method Updated!',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage.payments')->with($notification);
    }
    
}
