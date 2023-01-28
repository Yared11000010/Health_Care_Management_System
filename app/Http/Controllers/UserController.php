<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
 
        
        $users=User::all();

       return view('user.allusers',compact('users'));

    }
    
    public function create(){

        return view('user.addusers');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email' =>"required|email",
            'password'=> 'required|min:6',
            'role'=>'required'
         ]);
         $users=new User();
         $users->name=$request->input('name');
         $users->email=$request->input('email');
         $users->password=Hash::make($request->input('password'));
         $users->role=$request->input('role');
         $users->save();
         notify()->success('User Added! ✍️','successfully');

         return redirect('admin/allusers');
        
    }

    public function edit($id){

        $users=User::find($id);

        return view('user.editusers',compact('users'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email' =>"required|email",
            // 'password'=> 'required|min:6',
            'role'=>'required'
         ]);
         $users=User::find($request->input('id'));
         $users->name=$request->input('name');
         $users->email=$request->input('email');
        //  $users->password=Hash::make($request->input('password'));
         $users->role=$request->input('role');
         $users->update();
         notify()->success('User Updated! ✍️','successfully');

         return redirect('admin/allusers');
    }


    public function delete($id){

        $user=User::find($id);
        $user->delete();
        notify()->warning('User Deleted! 🚫','successfully');

        return redirect('admin/allusers');
    }
    
}