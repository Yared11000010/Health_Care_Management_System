<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\rooms;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
     public function index()
        {
            $rooms=rooms::all();
            return view('room.allroom',compact('rooms'));
        }
    public function create(){
        
        $department=department::all();
        return view('room.addroom',compact('department'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'department'=>'required',
            'roomtype'=>'required'
         ]);

         $room=new rooms();
         $room->department_id=$request->input('department');
         $room->roomtype=$request->input('roomtype');
         $room->available=$request->available==true?'1':'0';
         $room->save();
         
         notify()->success('Room Added! ✍️','successfully');

       return redirect('admin/allrooms');
    }
    public function edit($id){
        $rooms=rooms::find($id);
        $department=department::all();

        return view('room.editroom',compact('rooms','department'));
        
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'department'=>'required',
            'roomtype'=>'required'
         ]);
        // dd($request->all());
         $room=rooms::find($request->input('id'));
         $room->department_id=$request->input('department');
         $room->roomtype=$request->input('roomtype');
         $room->available=$request->available==true?'1':'0';
         $room->update();
         notify()->success('Room Updated! ✍️','successfully');

       return redirect('admin/allrooms');
    }

    public function delete($id){

         $rooms=rooms::findOrFail($id);
         $rooms->delete();        
         notify()->warning('Room Deleted! ✍️','successfully');

         return redirect('admin/allrooms');

    }
    public function active($id){

        $rooms=rooms::find($id);
        $rooms->available=1;
        $rooms->update();
        notify()->success('Room Available! ✍️','successfully');

        return redirect('admin/allrooms');
    }
    public function inactive($id){

        $rooms=rooms::find($id);
        $rooms->available=0;
        $rooms->update();
        notify()->success('Room Not Available! 🚫','');

        return redirect('admin/allrooms');
    }
    

}