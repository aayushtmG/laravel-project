<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Member;
use App\Models\News;
use App\Models\Event;
use App\Models\Notice;

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
                'title'=> 'News',
                'quantity'=> News::count(),
                'link'=>'/admin/news'
            ],
            [
                'title'=> 'Events',
                'quantity'=> Event::count(),
                'link'=>'/admin/events'
            ],
            [
                'title'=> 'Notices',
                'quantity'=> Notice::count(),
                'link'=>'/admin/notices'
            ]
            ]);
        return view('admin/home',compact('lists'));
    }
    public function show($pageName){
        return view('admin/pages/'.$pageName);
    }

    public function settings(){
        return view('admin/settings');
    }

}
