<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Member;

class AdminPageController extends Controller
{
    public function index(Request $request){
        $user = $request->user();

        $lists =collect([
            [
                'title'=> 'Home Page Sliders',
                'quantity'=> '5',
                'link'=>'/admin'
            ],
            [
                'title'=> 'Members',
                'quantity'=> Member::count(),
                'link'=>'/admin/members'
            ],
            [
                'title'=> 'Services',
                'quantity'=> Service::count(),
                'link'=>'/admin/services'
            ]
            ]);
        return view('admin/home',compact('lists'));
    }
    public function show($pageName){
        return view('admin/pages/'.$pageName);
    }

}
