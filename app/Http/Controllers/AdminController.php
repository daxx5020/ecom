<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function authentication(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:15',
        ]);
        
        $admin = admin::where('email', $request->email)->first();
        
        if ($admin && $request->password == $admin->password) {
            Session::put('admin', $admin);
            return redirect('/dashboard');
        }

        else{
            return redirect()->back()->withErrors(['login_error' => 'Invalid credentials']);
        }
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
