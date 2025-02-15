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
        $messages = Message::paginate(2);
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
        Message::create([
           'name' => $request->input('name'),
            'message' => $request->input('message'),
            'position'=> $request->input('position'),
            'email'=> $request->input('email'),
            'image'=> $request->input('image')
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
        $message->update([
            'message' => $request->input('message'),
        ]);
        return redirect()->route('admin.messages.show');
    }

}
