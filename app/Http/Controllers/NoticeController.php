<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function show(){
    $notices = Notice::all();
        return view('notice',compact('notices'));
    }
    public function adminShow(){
        $notices = Notice::all();
        return view('admin.notices.show',compact('notices'));
    }
    public function getAddNotice(){
        return view('admin.notices.create');
    }
    public function postAddNotice(Request $request){
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
            $file->move(public_path('/images/notices'),$filename);
        }
        $start_date = $request->start_date ?? now();
        $end_date = $request->end_date ?? now()->addDays(3);
        Notice::create([
        'title'=>$request->input('title'),
        'description'=>$request->input('description'),
        'image'=> $filename ?? null,
        ]);
        return redirect()->route('admin.notices.show');
    }
    public function deleteNotice(Request $request){
        $id = $request->id; 
        $notice = Notice::find($id);
        $previousImage = $notice->image;
        $previousFilepath = public_path('images/notices/'.$previousImage);
        if(file_exists($previousFilepath)){
                unlink($previousFilepath);
        }
        $notice->delete();
        return redirect()->route('admin.notices.show');
    }
    public function getEditNotice($id){
        $notice = Notice::findOrFail($id);
        return view('admin.notices.edit',compact('notice'));
    }

    public function postEditNotice(Request $request){
        $id = $request->id;
        $notice = Notice::find($id);
        if($request->hasFile('image')){
            $previousImage = $notice->image;
            $previousFilepath = public_path('images/notices/'.$previousImage);
            if(file_exists($previousFilepath)){
                unlink($previousFilepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->title).'.'.$extension;
            $file->move(public_path('/images/notices'),$filename);
            $notice->image = $filename;
        }
        $notice->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image'=> $notice->image
        ]);
        return redirect()->route('admin.notices.show');
    }
}
