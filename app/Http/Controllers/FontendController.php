<?php

namespace App\Http\Controllers;

use App\Models\general_settings;
use Illuminate\Http\Request;
use App\Models\User;
use Whoops\Run;

class FontendController extends Controller
{
    //
    public function index(){
        $allusers=User::count();
        $settings=general_settings::get()->first();
        return view('fontend.index',compact('settings'),compact('allusers'));
    }
}