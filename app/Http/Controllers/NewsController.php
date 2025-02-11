<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function show($id){
        $news = News::find($id);
        $relatedNews = News::where('id','!=',$id)->get();
        $title = 'News | '.$news->title;
        return view('news.show',compact('news','relatedNews','title'));
    }
    public function adminShow(){
        $news = News::paginate(4);
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
        $news = News::findOrFail($id);
        return view('admin.news.edit',compact('news'));
    }
    public function postEditNews(Request $request){
        $id = $request->id;
        $news = News::find($id);
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        if($request->hasFile('image')){
            $previousImage = $news->image;
            $previousFilepath = public_path('images/news/'.$previousImage);
            if(file_exists($previousFilepath)){
                unlink($previousFilepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->title).'.'.$extension;
            $file->move(public_path('/images/news/'),$filename);
            $news->image = $filename;
        }
        $news->update([
            'title' => $news->title,
            'description' => $news->description,
                'image'=>$news->image
        ]);
        return redirect()->route('admin.news.show');

    }
}
