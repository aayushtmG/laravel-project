<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutPage;

class AboutController extends Controller
{

    public function  index(){
        return view('about');
    }
    public function adminShow(){
        $page = AboutPage::first();
        return view('admin.pages.about',compact('page'));
    }
    public function adminPost(Request $request){
        $validated = $request->validate([
            'image'=>'required',
            'description'=>'required',
            'heading'=>'required'
        ]);
        $page = AboutPage::first();
        $filename = null;
        if($request->hasFile('image')){
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = 'about.'.$extension;
            $file->move(public_path('/images/about/'),$filename); 
        }
        $page->update([
            'image'=> $filename,
            'heading'=>$request->heading,
            'description'=>$request->description
        ]);
        return redirect()->route('admin.about.get');
    }
}
