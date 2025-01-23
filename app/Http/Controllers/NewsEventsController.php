<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Event;


class NewsEventsController extends Controller
{
   public function show(){
    $news = News::all();
    $events = Event::all();
    return view('news-events',compact('news','events'));
   } 
}
