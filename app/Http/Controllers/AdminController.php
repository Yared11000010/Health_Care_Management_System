<?php

namespace App\Http\Controllers;

use App\Models\birthreport;
use App\Models\department;
use App\Models\doctor;
use App\Models\general_settings;
use App\Models\patient;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function maindashboard(){
        $alldoctors=doctor::count();
        $patients=patient::count();
        $department=department::count();
        $birth=birthreport::count();
        
        $allusers=User::count();

        return view('maindashboard',compact('allusers','patients','alldoctors','birth','department'));
    }
    public function index()
    {
        $setting=general_settings::get()->first();
        return view('index',compact('setting'));
    }
    
    public function changepassword(){

        return view('admin.udpatepassword');
    }

    public function change_password(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        // return $request->all();
        if(!Hash::check($request->old_password, auth()->user()->password)){

            notify()->warning('your old password is not correct!');
        }
        // Current password and new password same
        if (!strcmp($request->get('new_password'), $request->get('confirm_password')) == 0) 
        {
            notify()->warning('new password and confirm password  not the same. !');
            return back();
        }
         #Update the new Password
         User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

      
            notify()->success('Password Updated! ✍️','success');

        return redirect()->back();
    }
    // public function contact_us(){
        
    //     $setting=general_settings::get()->first();
    //     return view('contact',compact('setting'));
    // }
    // public function about(){
        
    //     $setting=general_settings::get()->first();
    //     return view('about',compact('setting'));
    // }
    // public function docters(){
        
    //     $setting=general_settings::get()->first();
    //     return view('docter',compact('setting'));
    // }
    // public function services(){
        
    //     $setting=general_settings::get()->first();
    //     return view('services',compact('setting'));
    // }

    public function authenticate_admin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            notify()->success('Welcome to Dashboard ! ✍️','Welcome!!');
            return redirect()->intended('admin/');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }
    
    public function loginpage(){
        $setting=general_settings::get()->first();
        return view('admin.adminlogin');
    }
    public function logout(){
        
        Auth::logout();
         return view('admin.adminlogin');

    }
    public function loginvalidate(Request $request){

        $data=$request->all();
         
 
        $validateData=$request->validate([
         'email'=>'required|email',
         'password'=>'required',
        ]);
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            
            notify()->success('Welcome to Dashboard ! ✍️','Welcome!!');
            return redirect()->intended('admin/maindashboards');
          }
         
 
          return view('admin.adminlogin');

 }
}