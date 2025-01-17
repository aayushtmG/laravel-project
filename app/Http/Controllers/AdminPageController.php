<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function show($pageName){
        return view('admin/pages/'.$pageName);
    }
}
