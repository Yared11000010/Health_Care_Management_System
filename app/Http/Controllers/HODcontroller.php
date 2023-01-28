<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\hod;
use Illuminate\Http\Request;

class HODcontroller extends Controller
{
    //
    public function index(){
        $hod=hod::all();

        return view('hod.allhod',compact('hod'));
    }

    public function create(){
        $doctors=doctor::all();

        return view('hod.addhod',compact('doctors'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'hod'=>'required',
         ]);
         $hod=new hod();
         $hod->doctor_id=$request->input('hod');
         $hod->save();
         notify()->success('HOD Added! ✍️','successfully');

         return redirect('admin/allhod'); 
    }
    public function edit($id){


        $doctors=doctor::all();
        $hod=hod::find($id);
        
        return view('hod.edithod',compact('hod','doctors'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'hod'=>'required',
         ]);
         $hod=hod::find($request->input('id'));
         $hod->doctor_id=$request->input('hod');
         $hod->update();
         notify()->success('HOD Updated! ✍️','successfully');

         return redirect('admin/allhod'); 
        
    }

    public function delete($id){
        $hod=hod::find($id);

        $hod->delete();
        notify()->warning('Employee Deleted! ✍️','successfully');

        return redirect('admin/allhod'); 

    
    }

    
}