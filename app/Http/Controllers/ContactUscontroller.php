<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\subscriber;
use Illuminate\Http\Request;

class ContactUscontroller extends Controller
{
    //
    public function index(){

        $contact=contact::all();

        return view('contact_us.allcontact_us',compact('contact'));
        
    }
    public function delete($id){

        $contact=contact::find($id);
        $contact->delete();

        return redirect()->back();
    }
    
       public function contact_us(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email' =>"required|email",
            'phone'=> 'required|max:10',
            'subject'=>'required',
            'message'=>'required'
         ]);
         $users=new contact();
         $users->name=$request->input('name');
         $users->email=$request->input('email');
         $users->phone=$request->input('phone');
         $users->subject=$request->input('subject');
         $users->message=$request->input('message');
         $users->save();
         notify()->success('Your Message is sented!','Sented');

         return redirect()->back();
        
    }

    public function subscribe(Request $request){
        $this->validate($request,[
            'email' =>"required|email",
         ]);
         $subscribe=new subscriber();
         $subscribe->email=$request->input('email');

         $subscribe->save();
         return redirect()->back();
    }
}