<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Support\Facades\Storage;
use App\Models\doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Doctorcontroller extends Controller
{
    //
    public function index(){
        $doctors=doctor::all();
        
        return view('doctor.alldoctor',compact('doctors'));
    }

    public function create(){
       
        $departments=department::all();
        
        return view('doctor.adddoctor',compact('departments'));
    }

    public function store(Request $request){

        
        $this->validate($request,[
            'name'=>'required',
            'email' =>"required|email",
            'password'=> 'required|min:6',
            'phone'=>'required|max:10',
            'specialization'=>'required',
            'address'=>'required',
            'image' => 'required',
         ]);

        //  return dd($request->all());
       //   $path = $request->file('image')->store('public/image');
       if($request->hasFile('image')){
        //get file name with ext
        $fileNameWithExt=$request->file('image')->getClientOriginalName();
        //get just file name
        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get just file extenstion
        $extension=$request->file('image')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;

        //upload image
        $path=$request->file('image')->storeAs('public/doctors',$fileNameToStore);

       }else
         {
         $fileNameToStore='noimage.jpg';
       }

         $doctors=new doctor();


       //  $doctors->photo_path=$path;
         $doctors->name=$request->input('name');
         $doctors->email=$request->input('email');
         $doctors->password=Hash::make($request->input('password'));
         $doctors->phone=$request->input('phone');
         $doctors->photo_path=$fileNameToStore;
         $doctors->department=$request->input('department');
         $doctors->specialization=$request->input('specialization');
         $doctors->address=$request->input('address');
         $doctors->save();
         
         notify()->warning('Doctor Added! ✍️','successfully');

        return redirect('admin/alldoctors');
    }
    public function edit($id){
        $departments=department::all();
        $doctors=doctor::find($id);

        return view('doctor.editdoctor',compact('doctors','departments'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email' =>"required|email",
            // 'password'=> 'required|min:6',
            'phone'=>'required|max:10',
            'specialization'=>'required',
            'address'=>'required',
         ]);
         $doctors=doctor::find($request->input('id'));


        //  return dd($request->all());
       //   $path = $request->file('image')->store('public/image');
       if($request->hasFile('image')){
        //get file name with ext
        $fileNameWithExt=$request->file('image')->getClientOriginalName();
        //get just file name
        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get just file extenstion
        $extension=$request->file('image')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;

        //upload image
        $path=$request->file('image')->storeAs('public/doctors',$fileNameToStore);
        if ($doctors->photo_path) {
            Storage::delete('public/category/'.$doctors->photo_path);
          }

       }else
         {
         $fileNameToStore='noimage.jpg';
       }


       //  $doctors->photo_path=$path;
         $doctors->name=$request->input('name');
         $doctors->email=$request->input('email');
         $doctors->password=Hash::make($request->input('password'));
         $doctors->phone=$request->input('phone');
         $doctors->photo_path=$fileNameToStore;
         $doctors->department=$request->input('department');
         $doctors->specialization=$request->input('specialization');
         $doctors->address=$request->input('address');
         $doctors->update();
         
         notify()->warning('Doctor Updated! ✍️','successfully');

        return redirect('admin/alldoctors');
        
    }

    public function delete($id){

        $doctors=doctor::find($id);
        $doctors->delete();
        notify()->warning('Doctor Deleted! 🚫','successfully');

        return redirect('admin/alldoctors');
    }
}   