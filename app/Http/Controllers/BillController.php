<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\patient;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
      //
      public function index()
      {
          $bills=bill::all();
          return view('bill.allbill',compact('bills'));
      }
  public function create(){
      
      $patient=patient::all();
      return view('bill.addbill',compact('patient'));
  }
  public function store(Request $request){
      $this->validate($request,[
          'patients_id'=>'required',
          'amount'=>'required'
       ]);

       $bill=new bill();
       $bill->patients_id=$request->input('patients_id');
       $bill->amount=$request->input('amount');
       $bill->payed=$request->payed==true?'1':'0';
       $bill->save();
       notify()->success('Bill Added! ✍️','successfully');

     return redirect('admin/allbills');
  }
  public function edit($id){
      $bills=bill::find($id);
      $patient=patient::all();

      return view('bill.editbill',compact('bills','patient'));
      
  }
  public function update(Request $request)
  {
      $this->validate($request,[
          'patients_id'=>'required',
          'amount'=>'required'
       ]);
      // dd($request->all());
       $bill=bill::find($request->input('id'));
       $bill->patients_id=$request->input('patients_id');
       $bill->amount=$request->input('amount');
       $bill->payed=$request->available==true?'1':'0';
       $bill->update();
       notify()->success('Bill Updated! ✍️','successfully');

     return redirect('admin/allbills');
  }

  public function delete($id){

       $bills=bill::findOrFail($id);
       $bills->delete();        
       notify()->success('Bill Deleted! 🚫','successfully');

       return redirect('admin/allbills');

  }
  public function active($id){

      $bills=bill::find($id);
      $bills->payed=1;
      $bills->update();
      notify()->success('Bill Payed ! ✍️','successfully');

      return redirect('admin/allbills');
  }
  public function inactive($id){

      $bills=bill::find($id);
      $bills->payed=0;
      $bills->update();
      notify()->warning('Bill Not Payed ! 🚫','successfully');

      return redirect('admin/allbills');
  }
  
}