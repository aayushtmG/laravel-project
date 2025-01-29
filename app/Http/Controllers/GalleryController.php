<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class GalleryController extends Controller
{
    public function show($id){
        //returns all images of the album
        return view('admin.gallery.show',compact('albums'));
    }
    public function adminShow(){
        $albums = Album::all();
        return view('admin.gallery.show',compact('albums'));
    }
    public function create(Request $request){
        return view('admin.gallery.create');
    }
    public function post(Request $request){
        if($request->hasFile('thumbnail_image')){
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('/images/album/'.$request->album_name),$filename);
            $album = Album::create([
                'thumbnail_image' => $filename,
                'name'=> $request->album_name
            ]);
        }
        if($request->hasFile('images')){
            foreach($request->images as $image){
                // $extension = $image->getOriginalClientExtension(); 
                
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/images/album/{{$album->name}}/images'),$filename);
                Image::create([
                    'album_id' => $album->id,
                    'image_path'=> $filename,
                    'title'=> $request->title,
                    'description'=>$request->description
                ]);
            } 
        }
        
        return redirect()->route('admin.gallery.get');
    }
    public function delete(){
        return redirect()->route('admin.gallery.get');
    }
    public function getEditGallery(){
        return redirect()->route('admin.gallery.get');
    }
    public function postEditGallery(){
        return redirect()->route('admin.gallery.get');
    }
}
