<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class HomeController extends Controller
{
    public function index(){
        //notices for modal
        $notices = Notice::all();
        return view('home',compact('notices'));
    }
}
