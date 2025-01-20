<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller
{
    //
    public function index(){
        $services = Service::all();
        return view('services.index',compact('services'));
    }
    public function show($id){
        $service = Service::findOrFail($id);
        $relatedServices = Service::where('id','!=',$id)->get();
        return view('services.show',compact('service','relatedServices'));
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
    public function updateService(Request $request){
    }
    public function adminShow(){
        $services = Service::all();
        return view('admin.services.show',compact('services'));
    }
    public function deleteService(Request $request){
        $id = $request->id; 
        Service::where('id',$id)->delete();
        return redirect()->route('admin.services.show');
    }
}
