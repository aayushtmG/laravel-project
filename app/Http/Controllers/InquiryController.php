<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function all(){
        $inquiries = Inquiry::paginate(5);
        return  view('admin.inquiries.index',compact('inquiries'));
    }

    public function show($id){
        $inquiry = Inquiry::find($id);
        return  view('admin.inquiries.show',compact('inquiry'));
    }

    public function post(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        Inquiry::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'message'=> $request->message,
        ]);

        return redirect()->back();
    }

    public function delete(Request $request){
        $id = $request->id; 
        $inquiry = Inquiry::find($id);
        $inquiry->delete(); return redirect()->route('admin.inquiry.all');
    }
}
