<?php

namespace App\Http\Controllers;

use App\Models\birthreport;
use App\Models\doctor;
use App\Models\patient;
use Illuminate\Http\Request;

class BirthtController extends Controller
{
    //
    public function index(){

        $birth_reports=birthreport::all();
        
        return view('birth.allbirth',compact('birth_reports'));
    }

    public function create(){

        $patients=patient::all();
        $doctors=doctor::all();
        return view('birth.addbirth',compact('patients','doctors'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'patient'=>'required',
            'details'=>'required',
            'doctor'=>'required',
         ]);
        //  dd($request->all());
         $birth_reports=new birthreport();
         $birth_reports->patient=$request->input('patient');
         $birth_reports->description=$request->input('details');
         $birth_reports->doctor=$request->input('doctor');

         $birth_reports->save();

         notify()->success('Birth Report Added! ✍️','successfully');
         return redirect('admin/allbirth');
        }
        
    public function edit($id){
        $patients=patient::all();
        $doctors=doctor::all();
        $birth_reports=birthreport::find($id);
        
        return view('birth.editbirth',compact('birth_reports','doctors','patients'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'patient'=>'required',
            'details'=>'required',
            'doctor'=>'required',
         ]);
        //  dd($request->all());
         $birth_reports=birthreport::find($request->input('id'));
         $birth_reports->patient=$request->input('patient');
         $birth_reports->description=$request->input('details');
         $birth_reports->doctor=$request->input('doctor');

         $birth_reports->update();

         notify()->success('Birth Report Updated! ✍️','successfully');

     return redirect('admin/allbirth');
    }
    

    public function delete($id){

        $birth_reports=birthreport::find($id);
        $birth_reports->delete();
        notify()->warning('Bill Deleted! 🚫','successfully');
        return redirect('admin/allbirth');
    }
}