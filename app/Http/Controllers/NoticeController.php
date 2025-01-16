<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index(){
        $notices = Notice::all();
        return view('notice',compatct('notices'));
    }
}
