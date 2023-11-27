<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\category;
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
            return redirect('/admin/dashboard');
        }

        else{
            
            return redirect()->back()->withErrors(['login_error' => 'Invalid credentials']);
        }
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::forget('admin');
        return redirect('/admin/login');
    }

    public function category(){
        $categories = Category::all();
        return view('admin.add_category',compact('categories'));
    }


    public function addCategory(Request $request){

        $request->validate([
            'category_name' => 'required|string|max:255',
            'parent_category_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.category')->with('success', 'Category created successfully.');

    }

    public function addproduct(){
        $categories = Category::all();
        return view('admin.add_product',compact('categories'));
    }

    public function viewproduct(){
        return view('admin.view_product');
    }
}
