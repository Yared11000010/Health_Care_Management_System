<?php

namespace App\Http\Controllers;

use App\Models\general_settings;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function index(){
        $settings=Setting::all();

        return view('index',compact('settings'));
    }

    public function create(){
        $setting=general_settings::get()->first();;

        return view('setting.addsetting',compact('setting'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'workinghour'=>'required',
            'address'=>'required'
        
         ]);
    //dd($request->all());
    
    $setting=general_settings::find($request->input('id'));

     
        if($request->hasFile('logo')){
            //get file name with ext
            $fileNameWithExt=$request->file('logo')->getClientOriginalName();
            //get just file name
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just file extenstion
            $extension=$request->file('logo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
    
            //upload image
            $path=$request->file('logo')->storeAs('public/setting',$fileNameToStore);
            if ($setting->logo_path) {
                Storage::delete('public/setting/'.$setting->logo_path);
              }
              $setting->logo_path=$fileNameToStore;

    
        }
        
        if($request->hasFile('icon')){
            //get file name with ext
            $fileNameWithExt=$request->file('icon')->getClientOriginalName();
            //get just file name
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just file extenstion
            $extension=$request->file('icon')->getClientOriginalExtension();
            //file name to store
            $fileNameToStoreii=$fileName.'_'.time().'.'.$extension;
    
            //upload image
            $path=$request->file('icon')->storeAs('public/setting',$fileNameToStoreii);
              if ($setting->icon_logo_path) {
                Storage::delete('public/setting/'.$setting->icon_logo_path);
              }
              $setting->icon_logo_path=$fileNameToStoreii;

    
        }
        if($request->hasFile('favicon')){
            //get file name with ext
            $fileNameWithExt=$request->file('favicon')->getClientOriginalName();
            //get just file name
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just file extenstion
            $extension=$request->file('favicon')->getClientOriginalExtension();
            //file name to store
            $fileNameToStorei=$fileName.'_'.time().'.'.$extension;
    
            //upload image
            $path=$request->file('favicon')->storeAs('public/setting',$fileNameToStorei);
              if ($setting->favicon_path) {
                Storage::delete('public/setting/'.$setting->favicon_path);
              }
              $setting->favicon_path=$fileNameToStorei;

    
        }
         $setting->title=$request->input('title');
         $setting->description=$request->input('description');
         $setting->business_phone=$request->input('phone');
         $setting->business_email=$request->input('email');
         $setting->working_horse=$request->input('workinghour');
         $setting->address=$request->input('address');


    
         $setting->update();
         notify()->success('setting Updated! ✍️','successfully');
       

        
     return redirect()->back();
    }
}