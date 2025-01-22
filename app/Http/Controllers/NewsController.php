<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function show(){
        $news = News::all();
        return view('news',compact('news'));
    }
    public function adminShow(){
        $news = News::all();
        return view('admin.news.show',compact('news'));
    }
    public function getAddNews(){
        return view('admin.news.create');
    }

    public function postAddNews(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if(!$validated){
            return null;
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->title).'.'.$extension;
            $file->move(public_path('/images/news'),$filename);
            News::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'image'=> $filename ?? null
            ]);
        }
        return redirect()->route('admin.news.show');
    }
    public function deleteNews(Request $request){
        $id = $request->id; 
        News::where('id',$id)->delete();
        return redirect()->route('admin.news.show');
    }
    public function getEditNews($id){
        $member = News::findOrFail($id);
        return view('admin.news.edit',compact('member'));
    }
    public function postEditNews(Request $request){
        $id = $request->id;
        $member = News::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:news,email,'.$id,
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
        return redirect()->route('admin.news.show');

    }
}
