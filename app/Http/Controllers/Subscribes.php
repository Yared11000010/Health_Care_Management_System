<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;

class Subscribes extends Controller
{
    //
    public function index(){
        
        $subscriber=subscriber::all();
        return view('subscriber.allsubscriber',compact('subscriber'));
    }
}