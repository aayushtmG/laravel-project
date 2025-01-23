<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function show(){
    $messages = Message::all();
        return view('message',compact('messages'));
    }
    public function adminShow(){
        $messages = Message::all();
        return view('admin.messages.show',compact('messages'));
    }
    public function getAddMessage(){
        return view('admin.messages.create');
    }
    public function postAddMessage(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'message' => 'required',
            'email' => 'required|email',
            'image'=> 'required',
            'position'=>'required'
        ]);
        // hanlde file upload
        $filename = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->name).'.'.$extension;
            $file->move(public_path('/images/messages'),$filename);
        }
        Message::create([
           'name' => $request->input('name'),
            'message' => $request->input('message'),
            'position'=> $request->input('position'),
            'email'=> $request->input('email'),
            'image'=> $filename ?? null
        ]); 
        return redirect()->route('admin.messages.show');
    }
    public function deleteMessage(Request $request){
        $id = $request->id; 
        $message = Message::find($id);
        $previousImage = $message->image;
        $previousFilepath = public_path('images/messages/'.$previousImage);
        if(file_exists($previousFilepath)){
                unlink($previousFilepath);
        }
        $message->delete();
        return redirect()->route('admin.messages.show');
    }
    public function getEditMessage($id){
        $message = Message::findOrFail($id);
        return view('admin.messages.edit',compact('message'));
    }

    public function postEditMessage(Request $request){
        $id = $request->id;
        $message = Message::find($id);
        if($request->hasFile('image')){
            $previousImage = $message->image;
            $previousFilepath = public_path('images/messages/'.$previousImage);
            if(file_exists($previousFilepath)){
                unlink($previousFilepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->name).'.'.$extension;
            $file->move(public_path('/images/messages'),$filename);
            $message->image = $filename;
        }
        $message->update([
            'name' => $request->input('name'),
            'message' => $request->input('message'),
            'position'=> $request->input('position'),
            'email'=> $request->input('email'),
            'image'=> $message->image
        ]);
        return redirect()->route('admin.messages.show');
    }

}
