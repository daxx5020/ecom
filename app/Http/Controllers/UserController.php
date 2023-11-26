<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(){
        return view('user.registration');
    }

    public function registration(Request $request){
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:usermodels,email',
            'mobileno' => 'required|unique:usermodels,mobileno',
            'username' => 'required|unique:usermodels,username',
            'password' => 'required|min:8|max:15',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); 
        }

        $user = usermodel::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobileno' => $request->mobileno,
            'username' => $request->username,
            'password' => $request->password,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
        ]);
        
        return redirect()->back()->with('success', 'Record added successfully');
        

    }

    public function login(){
        return view('user.login');
    }

    public function authentication(request $request){
        
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8|max:15',
        ]);
        
        $user = usermodel::where('username', $request->username)->first();
        
        if ($user && $request->password == $user->password) {
            Session::put('user', $user);
            return redirect('/user/dashboard');
        }

        else{
            
            return redirect()->back()->withErrors(['login_error' => 'Invalid credentials'])->withInput();
        }

    }

    public function dashboard(){
        return view('user.dashboard');
    }

    public function logout(){
        Session::forget('user');
        return redirect('/user/login');
    }
}
