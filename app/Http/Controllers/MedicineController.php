<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    //
    public function index()
    {
        $medicine=medicine::all();
        return view('medicine.allmedicine',compact('medicine'));
    }

    public function create(){
    
  
    return view('medicine.addmedicine');
    
    }
    
    public function store(Request $request){
    $this->validate($request,[
        'medicine_name'=>'required',
        'expiry_date'=>'required',
        'price'=>'required',
        'quantity'=>'required',
        'code'=>'required'
     ]);


     $medicine=new medicine();
     $medicine->medicine_name=$request->input('medicine_name');
     $medicine->expiry_date=$request->input('expiry_date');
     $medicine->price=$request->input('price');
     $medicine->quantity=$request->input('quantity');
     $medicine->code=$request->input('code');

     $medicine->save();
     notify()->warning('Medicine Added! ✍️','successfully');

   return redirect('admin/allmedicine');
}
public function edit($id){
    $medicine=medicine::find($id);
  

    return view('medicine.editmedicine',compact('medicine'));
    
}
public function update(Request $request)
{
    $this->validate($request,[
        'medicine_name'=>'required',
        'expiry_date'=>'required',
        'price'=>'required',
        'quantity'=>'required',
        'code'=>'required'
     ]);
    // dd($request->all());
     $medicine=medicine::find($request->input('id'));
     
     $medicine->medicine_name=$request->input('medicine_name');
     $medicine->expiry_date=$request->input('expiry_date');
     $medicine->price=$request->input('price');
     $medicine->quantity=$request->input('quantity');
     $medicine->code=$request->input('code');

     $medicine->update();
     notify()->success('Medicine Updated! ✍️','successfully');

   return redirect('admin/allmedicine');
}

public function delete($id){

     $medicine=medicine::findOrFail($id);
     $medicine->delete();        
     notify()->warning('Medicine Deleted! ✍️','successfully');

     return redirect('admin/allmedicine');

}
}