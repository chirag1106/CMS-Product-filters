<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function main()
    {
        return view('admin/index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', '=', $request->email)->first();

        if ($admin) {
            // if ($admin['status']) {
            //     return back()->with('fail', 'Already LoggedIn from another device');
            // } else {
                if (Hash::check($request->password, $admin->password)) {
                    if ($admin['email_status']) {
                        $request->session()->put('name', $admin->name);
                        $request->session()->put('email', $admin->email);
                        $request->session()->put('admin_id', $admin->admin_id);
                        $admin = $admin->update([
                            'last_login' => Carbon::now()->toDateTimeString(),
                            'status' => 1
                        ]);
                        if ($admin) {
                            return redirect('dashboard');
                        } else {
                            return back()->with('fail', 'Some error occured in last login');
                        }
                    } else {
                        return back()->with('fail', 'Not Verified! Kindly do the verification first');
                    }
                } else {
                    return back()->with('fail', 'Email or Password is incorrect');
                }
            // }
        } else {
            return back()->with('fail', 'User does not exists, Kindly register!');
        }
    }

    public function dashboard(){
        return view('admin.dashboard.importExcel');
    }
}
