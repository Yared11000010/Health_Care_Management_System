<?php

namespace App\Http\Controllers;

use App\Models\block;
use App\Models\department;
use App\Models\hod;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department=department::all();
        return view('department.alldepartment',compact('department'));
    }

    public function create(){
        $department=department::all();
    
        $block=block::all();
        $hod=hod::all();
        return view('department.adddepartment',compact('department','block','hod'));
    
    }
    
    public function store(Request $request){
    $this->validate($request,[
        'name'=>'required',
        'description'=>'required',
        'hod_id'=>'required',
        'block_id'=>'required'
     ]);
    

     $department=new department();
     $department->name=$request->input('name');
     $department->description=$request->input('description');
     $department->hod_id=$request->input('hod_id');
     $department->block_id=$request->input('block_id');
     $department->save();
     notify()->warning('Department Saved! ✍️','successfully');

   return redirect('admin/alldepartment');
}
public function edit($id){
    $department=department::find($id);
    $block=block::all();
    $hod=hod::all();

    return view('department.editdepartment',compact('department','block','hod'));
    
}
public function update(Request $request)
{
    $this->validate($request,[
        'name'=>'required',
        'description'=>'required',
        'hod_id'=>'required',
        'block_id'=>'required'
     ]);
    // dd($request->all());
     $department=department::find($request->input('id'));
     $department->name=$request->input('name');
     $department->description=$request->input('description');
     $department->hod_id=$request->input('hod_id');
     $department->block_id=$request->input('block_id');
     $department->update();
     notify()->success('Department Updated! ✍️','successfully');

     return redirect('admin/alldepartment');
}

    public function delete($id)
    {

        $department=department::findOrFail($id);
        $department->delete();        
        notify()->warning('Department Deleted! 🚫','successfully');

        return redirect('admin/alldepartment');

   }

}