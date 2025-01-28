<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Member;

class HomeController extends Controller
{
    public function index(){
        $ceo = Member::where('position','=','CEO')->first();
        $notices = Notice::all();
        return view('home',compact('notices','ceo'));
    }
}
