<?php

namespace App\Http\Controllers;
use App\Models\block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    //
    public function index(){
        $block=block::all();

        return view('block.allblocks',compact('block'));
    }

    public function create(){
        $block=block::all();

        return view('block.addblock',compact('block'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'blockfloor'=>'required|integer',
            'blockcode'=>'required|integer'
         ]);

        //  dd($request->all());
         $block=new block();
         $block->blockfloor=$request->input('blockfloor');
         $block->blockcode=$request->input('blockcode');

         $block->save();
         
         notify()->success('Block Added! ✍️','success');
         return redirect('admin/allblock'); 
    }
    public function edit($id){


        $block=block::find($id);
        
        return view('block.editblock',compact('block'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'blockfloor'=>'required|integer',
            'blockcode'=>'required|integer'
         ]);

        //  dd($request->all());
         $block=block::find($request->input('id'));
         $block->blockfloor=$request->input('blockfloor');
         $block->blockcode=$request->input('blockcode');

         $block->update();
         
         notify()->success('Block Updated!','success');
         return redirect('admin/allblock'); 
        
    }

    public function delete($id){
        $block=block::find($id);

        $block->delete();
        notify()->warning('Block Deleted! 🚫','Deleted');

        return redirect('admin/allblock'); 

    
    }
}