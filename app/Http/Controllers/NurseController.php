<?php

namespace App\Http\Controllers;

use App\Models\nurse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    //
    public function index()
    {
        $nurse=nurse::all();
        return view('nurse.allnurse',compact('nurse'));
    }

    public function create(){
    
  
    return view('nurse.addnurse');
    
    }
    
    public function store(Request $request){
        
            $this->validate($request,[
                'name'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'gender'=>'required',
                'qualification'=>'required',
                'position'=>'required',
                'registered'=>'required'
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
        $path=$request->file('image')->storeAs('public/nurse',$fileNameToStore);

    }else
        {
        $fileNameToStore='noimage.jpg';
    }
     $nurse=new nurse();
     $nurse->name=$request->input('name');
     $nurse->email=$request->input('email');
     $nurse->phone=$request->input('phone');
     $nurse->address=$request->input('address');
     $nurse->gender=$request->input('gender');
     $nurse->qualification=$request->input('qualification');
     $nurse->position=$request->input('position');
     $nurse->registered=$request->registered==true?'1':'0';

     $nurse->photo_path=$fileNameToStore;


     $nurse->save();
     
    notify()->success('Nurse Added! ✍️','successfully');
    return redirect('admin/allnurse');
}
public function edit($id){
    $nurse=nurse::find($id);
  

    return view('nurse.editnurse',compact('nurse'));
    
}
public function update(Request $request)
{
    $this->validate($request,[
        'name'=>'required',
        'phone'=>'required|max:10',
        'address'=>'required',
        'gender'=>'required',
        'qualification'=>'required',
        'position'=>'required',
        'registered'=>'required'
    ]);
    // dd($request->all());
     $nurse=nurse::find($request->input('id'));

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
        $path=$request->file('image')->storeAs('public/nurse',$fileNameToStore);
        if ($nurse->photo_path) {
            Storage::delete('public/nurse/'.$nurse->photo_path);
          }
          $nurse->photo_path=$fileNameToStore;

       }else
         {
         $fileNameToStore='noimage.jpg';
       }

       $nurse->name=$request->input('name');
       $nurse->email=$request->input('email');
       $nurse->phone=$request->input('phone');
       $nurse->address=$request->input('address');
       $nurse->gender=$request->input('gender');
       $nurse->qualification=$request->input('qualification');
       $nurse->position=$request->input('position');
       $nurse->registered=$request->registered==true?'1':'0';

     $nurse->update();
     notify()->success('Nurse Updated! ✍️','successfully');

   return redirect('admin/allnurse');
}

public function delete($id){

     $nurse=nurse::findOrFail($id);
     if($nurse->image!='noimage.jpg'){
        Storage::delete('public/nurse/'.$nurse->image);
      }
      
     $nurse->delete();        
     notify()->warning('Nurse Deleted! ✍️','successfully');

     return redirect('admin/allnurse');

}

public function active($id){

    $nurses=nurse::find($id);
    $nurses->registered=1;
    $nurses->update();
    notify()->success('Nurse Registered! ✍️','successfully');

    return redirect('admin/allnurse');
}
public function inactive($id){

    $nurses=nurse::find($id);
    $nurses->registered=0;
    $nurses->update();
    notify()->warning('Nurse Not Registered! ✍️');

    return redirect('admin/allnurse');
}
}