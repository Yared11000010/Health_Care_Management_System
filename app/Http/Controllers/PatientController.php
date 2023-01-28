<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function index(){
        
        $patients=patient::all();

        return view('patients.allpatient',compact('patients'));
    }

    public function delete($id){

        $patients=patient::find($id);
        if($patients->photo_path!='noimage.jpg'){
          Storage::delete('public/patients/'.$patients->photo_path);
        }
        $patients->delete();
        notify()->warning('Patient Deleted! 🚫','successfully');

        return redirect('admin/allpatients');

    }
    public function create(){
        
        return view('patients.addpatient');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'gender'=> 'required|min:6',
            'phone'=>'required|max:10',
            'address'=>'required',
            'gender'=>'required',
            'age' => 'required',
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
        $path=$request->file('image')->storeAs('public/patients',$fileNameToStore);

       }else
         {
         $fileNameToStore='noimage.jpg';
       }

         $patients=new patient();


       //  $patients->photo_path=$path;
         $patients->name=$request->input('name');
         $patients->email=$request->input('email');
         $patients->phone=$request->input('phone');
         $patients->address=$request->input('address');
         $patients->gender=$request->input('gender');
         $patients->age=$request->input('age');
         $patients->bloodgroup=$request->input('bloodgroup');
         $patients->photo_path=$fileNameToStore;
        
         $patients->save();
         
         notify()->success('Patient Added! ✍️','successfully');

        return redirect('admin/allpatients');
        
    }

    public function edit($id){

        $patients=patient::find($id);
        return view('patients.editpatient',compact('patients')); 
    }
    public function update(Request $request){

        
        $this->validate($request,[
            'name'=>'required',
            'gender'=> 'required|min:6',
            'phone'=>'required|max:10',
            'address'=>'required',
            'gender'=>'required',
            'age' => 'required',
            
         ]);
         
         $patients=patient::find($request->input('id'));
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
        $path=$request->file('image')->storeAs('public/patients',$fileNameToStore);
        if ($patients->photo_path) {
            Storage::delete('public/patients/'.$patients->photo_path);
          }

          $patients->photo_path=$fileNameToStore;


       }else
         {
         $fileNameToStore='noimage.jpg';
       }

     


       //  $patients->photo_path=$path;
         $patients->name=$request->input('name');
         $patients->email=$request->input('email');
         $patients->phone=$request->input('phone');
         $patients->address=$request->input('address');
         $patients->gender=$request->input('gender');
         $patients->age=$request->input('age');
         $patients->bloodgroup=$request->input('bloodgroup');
        
         $patients->update();
         
         notify()->success('Patient Updated! ✍️','successfully');

        return redirect('admin/allpatients');
    }

}