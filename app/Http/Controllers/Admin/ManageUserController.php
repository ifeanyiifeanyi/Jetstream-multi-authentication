<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        $notification = [
            'message'   => 'User Account Deleted!',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage.user')->with($notification);
    }
}
