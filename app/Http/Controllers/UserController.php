<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel;
use App\Models\emailverification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Mail;

class UserController extends Controller
{
    public function register(){
        return view('user.registration');
    }

    public function registration(Request $request){
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'email' => 'required|email|unique:usermodels,email',
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
            'password' => bcrypt($request->password),
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
        ]);
        
        // return redirect()->back()->with('success', 'You are successfully registered');
        return redirect("/user/verification/".$user->id);
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
        
       if($user && $user->is_verified == 0){
        $this->sendOtp($user);
        return redirect("/user/verification/".$user->id);
       }
       
       else if($user && Hash::check($request->password, $user->password)){
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




    public function sendOtp($user)
    {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';

        $data['body'] = 'Your OTP is:- '.$otp;

        Mail::send('mail.mailVerification',['data'=>$data],function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
    }


    public function verification($id)
    {
        $user = usermodel::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND

        return view('auth.verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = usermodel::where('email',$request->email)->first();
        $otpData = emailverification::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                usermodel::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
        $user = usermodel::where('email',$request->email)->first();
        $otpData = emailverification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }

}

