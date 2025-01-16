<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index(){
        return view('notice',compact('notices'));
    }
}
