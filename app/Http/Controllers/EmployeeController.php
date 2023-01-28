<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $employee=employee::all();
        return view('employee.allemployee',compact('employee'));
    }

    public function create(){
    
  
    return view('employee.addemployee');
    
    }
    
    public function store(Request $request){
    $this->validate($request,[
        'name'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'gender'=>'required',
        'job'=>'required'
    
     ]);
//  dd($request->all());
 
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
        $path=$request->file('image')->storeAs('public/employee',$fileNameToStore);

    }else
        {
        $fileNameToStore='noimage.jpg';
    }
     $employee=new employee();
     $employee->name=$request->input('name');
     $employee->email=$request->input('email');
     $employee->phone=$request->input('phone');
     $employee->address=$request->input('address');
     $employee->gender=$request->input('gender');
     $employee->job=$request->input('job');
     $employee->salary=$request->input('salary');
     $employee->image=$fileNameToStore;


     $employee->save();
     notify()->success('Employee Saved! ✍️','successfully');
   
   return redirect('admin/allemployee');
}
public function edit($id){
    $employee=employee::find($id);
  

    return view('employee.editemployee',compact('employee'));
    
}
public function update(Request $request)
{
    $this->validate($request,[
        'name'=>'required|',
        'phone'=>'required',
        'address'=>'required',
        'gender'=>'required',
        'job'=>'required'
     ]);
    // dd($request->all());
     $employee=employee::find($request->input('id'));

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
        $path=$request->file('image')->storeAs('public/employee',$fileNameToStore);
        if ($employee->image) {
            Storage::delete('public/employee/'.$employee->image);
          }
          $employee->image=$fileNameToStore;

       }else
         {
         $fileNameToStore='noimage.jpg';
       }

     $employee->name=$request->input('name');
     $employee->email=$request->input('email');
     $employee->phone=$request->input('phone');
     $employee->address=$request->input('address');
     $employee->gender=$request->input('gender');
     $employee->job=$request->input('job');
     $employee->salary=$request->input('salary');

     $employee->update();
     notify()->success('Employee Updated! ✍️','successfully');

   return redirect('admin/allemployee');
}

public function delete($id){

     $employee=employee::findOrFail($id);
     if($employee->image!='noimage.jpg'){
        Storage::delete('public/employee/'.$employee->image);
      }
      
     $employee->delete();        
     notify()->warning('Employee Deleted! 🚫','successfully');

     return redirect('admin/allemployee');

}
}