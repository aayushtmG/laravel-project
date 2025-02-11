<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function show($id){
    $event = Event::find($id);
    $relatedEvents = Event::where('id', '!=',$id)->get();
    $title = 'Event | '.$event->title; 
        return view('events.show',compact('event','relatedEvents','title'));
    }
    public function adminShow(){
        $events = Event::paginate(4);
        return view('admin.events.show',compact('events'));
    }
    public function getAddEvent(){
        return view('admin.events.create');
    }
    public function postAddEvent(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        // hanlde file upload
        $filename = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->title).'.'.$extension;
            $file->move(public_path('/images/events'),$filename);
        }
        $start_date = $request->start_date ?? now();
        $end_date = $request->end_date ?? now()->addDays(3);
        Event::create([
        'title'=>$request->input('title'),
        'description'=>$request->input('description'),
        'image'=> $filename ?? null,
        'start_date'=> $start_date,
        'end_date'=> $end_date,
        ]);
        return redirect()->route('admin.events.show');
    }
    public function deleteEvent(Request $request){
        $id = $request->id; 
        $event = Event::find($id);
        $previousImage = $event->image;
        $previousFilepath = public_path('images/events/'.$previousImage);
        if(file_exists($previousFilepath)){
                unlink($previousFilepath);
        }
        $event->delete();
        return redirect()->route('admin.events.show');
    }
    public function getEditEvent($id){
        $event = Event::findOrFail($id);
        return view('admin.events.edit',compact('event'));
    }

    public function postEditEvent(Request $request){
        $id = $request->id;
        $event = Event::find($id);
        if($request->hasFile('image')){
            $previousImage = $event->image;
            $previousFilepath = public_path('images/events/'.$previousImage);
            if(file_exists($previousFilepath)){
                unlink($previousFilepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->title).'.'.$extension;
            $file->move(public_path('/images/events'),$filename);
            $event->image = $filename;
        }
        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image'=> $event->image
        ]);
        return redirect()->route('admin.events.show');
    }
}
