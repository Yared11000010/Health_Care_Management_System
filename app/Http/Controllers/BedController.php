<?php

namespace App\Http\Controllers;

use App\Models\beds;
use App\Models\patient;
use App\Models\rooms;
use Illuminate\Http\Request;

class BedController extends Controller
{
    //
      //
      public function index()
      {
          $beds=beds::all();
          return view('bed.allbed',compact('beds'));
      }
 
      public function create(){
      
      $patients=patient::all();
      $rooms=rooms::all();
      return view('bed.addbed',compact('patients','rooms'));
      
      }
      
      public function store(Request $request){
      $this->validate($request,[
          'room'=>'required',
          'patient'=>'required',
          'alloted_time'=>'required',
          'discharge_time'=>'required'
       ]);


       $beds=new beds();
       $beds->room_id=$request->input('room');
       $beds->patient_id=$request->input('patient');
       $beds->alloted_time=$request->input('alloted_time');
       $beds->discharge_time=$request->input('discharge_time');
       $beds->save();
       notify()->success('Bed Added! ✍️','success');

     return redirect('admin/allbeds');
  }
  public function edit($id){
      $beds=beds::find($id);
      $patients=patient::all();
      $rooms=rooms::all();

      return view('bed.editbed',compact('beds','patients','rooms'));
      
  }
  public function update(Request $request)
  {
    $this->validate($request,[
        'room'=>'required',
        'patient'=>'required',
        'alloted_time'=>'required',
        'discharge_time'=>'required'
     ]);
      // dd($request->all());
       $beds=beds::find($request->input('id'));
       $beds->room_id=$request->input('room');
       $beds->patient_id=$request->input('patient');
       $beds->alloted_time=$request->input('alloted_time');
       $beds->discharge_time=$request->input('discharge_time');
       $beds->update();
       notify()->success('Bed Updated! ✍️','success');

     return redirect('admin/allbeds');
  }

  public function delete($id){

       $beds=beds::findOrFail($id);
       $beds->delete();        
       
       return redirect('admin/allbeds');

  }
 
}