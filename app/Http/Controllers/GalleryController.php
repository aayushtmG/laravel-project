<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class GalleryController extends Controller
{
    // All albums
    public function index(){
        $albums = Album::all();
        return view('gallery.show',compact('albums'));
    }

    //images of one album
    public function show($id){
        $album = Album::where('id',$id)->first();
        $title = 'Album | '. $album->name;
        $images = Image::where('album_id',$id)->get();
        return view('gallery.show',compact('images','album','title'));
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
            $filename = "thumbnail_image".'.'.$extension;
            $file->move(public_path('/images/albums/'.$request->album_name),$filename);
            $album = Album::create([
                'thumbnail_image' => $filename,
                'name'=> $request->album_name
            ]);
        }
        if($request->hasFile('images')){
            foreach($request->images as $image){
                // $extension = $image->getOriginalClientExtension(); 
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/images/albums/'.$album->name.'/images'),$filename);
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
    public function delete(Request $request){
        $album = Album::find($request->id);
        $album_path = public_path('images/albums/'.$album->name);
        if(file_exists($album_path)){
            $this->deleteDirectory($album_path);
            $album->delete();
        }

        return redirect()->route('admin.gallery.get');
    }
    public function getEditGallery($id){
        $album = Album::find($id);
        return view('admin.gallery.edit',compact('album')) ;
    }
public function postEditGallery(Request $request)
{
    $album = Album::findOrFail($request->id);

    $previous_album_name =  $album->name;

    // Handle removed images
    if ($request->has('removed_images')) {
        foreach ($request->input('removed_images') as $imageId) {
            $image = Image::find($imageId);
            if ($image) {
                // Delete the image file from storage
                unlink(public_path('/images/albums/' . $previous_album_name . '/images/' . $image->image_path));
                // Delete the image record from the database
                $image->delete();
            }
        }
    }
    // Update album name
    if($request->input('album_name') != $previous_album_name){
        $oldPath = public_path('/images/albums/' . $previous_album_name );
        $newPath = public_path('/images/albums/' . $request->input('album_name') );
        if(file_exists($oldPath)){
            rename($oldPath, $newPath);
        }
        $album->name = $request->input('album_name');
        $album->save();
    }
    // Handle new images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/images/albums/'.$album->name.'/images'),$filename);
            // Save the image record to the database
            $album->images()->create([
                'image_path' => $filename,
            ]);
        }
    }
        if($request->hasFile('thumbnail_image')){
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $filename = "thumbnail_image".'.'.$extension;
        $previousImage = $album->thumbnail_image;
        $previousFilepath = public_path('images/albums/'.$album->name.'/'.$previousImage);
        if(file_exists($previousFilepath)){
                unlink($previousFilepath);
        }
            $file->move(public_path('/images/albums/'.$request->album_name),$filename);
            $album->thumbnail_image = $filename;
            $album->save();
        }
    return redirect()->route('admin.gallery.get')->with('success', 'Album updated successfully.');
}

    protected function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }

}
