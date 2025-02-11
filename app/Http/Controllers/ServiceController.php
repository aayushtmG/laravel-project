<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;


class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('services.index',compact('services'));
    }
    public function show($id){
        $service = Service::findOrFail($id);
        $relatedServices = Service::where('id','!=',$id)->get();
        $title = 'Service | '.$service->title;
        return view('services.show',compact('service','relatedServices','title'));
    }

    public function postCreateService(Request $request){
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
            $file->move(public_path('/images/services'),$filename);
            Service::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'image'=> $filename ?? null
            ]);
        }
        return redirect()->route('admin.services.show');
    }
    public function getCreateService(){
        return view('admin.services.create');
    }
    public function adminShow(){
        $services = Service::all();
        return view('admin.services.show',compact('services'));
    }
    public function getEditService($id){
        $service = Service::findOrFail($id);
        return view('admin.services.edit',compact('service'));
    }
    public function postEditService(Request $request){
        $id = $request->id;
        $service = Service::find($id);
        if($request->hasFile('image')){
            $previousImage = $service->image;
            $previousFilepath = public_path('images/services/'.$previousImage);
            if(file_exists($previousFilepath)){
                unlink($previousFilepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str_replace(' ','_',$request->title).'.'.$extension;
            $file->move(public_path('/images/services'),$filename);
            $service->image = $filename;
        }
        $service->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image'=> $service->image
        ]);
        return redirect()->route('admin.services.show');
    }
    public function deleteService(Request $request){
        $id = $request->id; 
        $service = Service::find($id);
        $previousImage = $service->image;
        $previousFilepath = public_path('images/services/'.$previousImage);
        if(file_exists($previousFilepath)){
                unlink($previousFilepath);
        }
        $service->delete();
        return redirect()->route('admin.services.show');
    }
}
