<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function show(){
    $events = Event::all();
        return view('event',compact('events'));
    }
    public function adminShow(){
        $events = Event::all();
        return view('admin.events.show',compact('events'));
    }
    public function getAddEvent(){
        return view('admin.events.create');
    }
    public function postAddEvent(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:events,email',
            'contact' => 'required|min:8',
            'position' => 'required',
            'department'=> 'required',
            'image'=>'required|image'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = $request->department.'-'.str_replace(" ","_",$request->name).'.'.$extension ;
            $file->move(public_path('/images/teams/'.$request->department),$filename);
            Event::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'contact'=>$request->input('contact'),
                'position'=>$request->input('position'),
                'department'=>$request->input('department'),
                'image'=> $filename ?? null
            ]);
        }
        return redirect()->route('admin.events.show');
    }
    public function deleteEvent(Request $request){
        $id = $request->id; 
        Event::where('id',$id)->delete();
        return redirect()->route('admin.events.show');
    }
    public function getEditEvent($id){
        $member = Event::findOrFail($id);
        return view('admin.events.edit',compact('member'));
    }
    public function postEditEvent(Request $request){
        $id = $request->id;
        $member = Event::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:events,email,'.$id,
            'contact' => 'required|min:8',
            'position' => 'required',
            'department'=> 'required',
        ]);
        if($request->hasFile('image')){
            $previousImage = $member->image;
            $previousFilepath = public_path('images/teams/'.$member->department.$previousImage);
            if(file_exists($previousFilepath)){
                unlink($previousFilepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->name).'.'.$extension;
            $file->move(public_path('/images/teams/'.$member->department),$filename);
            $member->image = $filename;
        }
        $member->update([
        'name'=> $request->input('name'),
        'position' => $request->input('position'),
        'email'=> $request->input('email'),
        'contact'=>$request->input('contact'),
        'department'=>$request->input('department'),
        'image'=>$member->image
        ]);
        return redirect()->route('admin.events.show');

    }
}
