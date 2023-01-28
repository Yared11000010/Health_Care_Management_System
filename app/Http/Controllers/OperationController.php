<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\operationreport;
use App\Models\patient;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    //
    public function index(){
        $operations=operationreport::all();
        
        return view('operation.alloperations',compact('operations'));
    }
    public function create(){

        $patients=patient::all();
        $doctors=doctor::all();
        return view('operation.addoperations',compact('patients','doctors'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'patient'=>'required',
            'details'=>'required',
            'doctor'=>'required',
            'time'=>'required'
         ]);
        //  dd($request->all());
         $operation=new operationreport();
         $operation->patient=$request->input('patient');
         $operation->description=$request->input('details');
         $operation->doctor=$request->input('doctor');
         $operation->time=$request->input('time');

         $operation->save();

         notify()->success('Operation Saved! ✍️','successfully');

     return redirect('admin/alloperations');
        }
    public function edit($id){
        $patients=patient::all();
        $doctors=doctor::all();
        $operations=operationreport::find($id);
        
        return view('operation.editoperation',compact('operations','doctors','patients'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'patient'=>'required',
            'details'=>'required',
            'doctor'=>'required',
            'time'=>'required'
         ]);
        //  dd($request->all());
         $operation=operationreport::find($request->input('id'));
         $operation->patient=$request->input('patient');
         $operation->description=$request->input('details');
         $operation->doctor=$request->input('doctor');
         $operation->time=$request->input('time');

         $operation->update();

     notify()->success('Operation Updated! ✍️','successfully');
     return redirect('admin/alloperations');
    }
    

    public function delete($id){

        $operations=operationreport::find($id);
        $operations->delete();
        notify()->warning('Operation Deleted! 🚫','successfully');

        return redirect('admin/alloperations');
    }
    
}