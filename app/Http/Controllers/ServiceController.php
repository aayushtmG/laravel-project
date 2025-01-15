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

    public function createService(Request $request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('/images/uploads'),$filename);
            Service::create([
                'id'=>random_int(1,500),
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'image'=> $filename ?? null
            ]);
        }
        return redirect()->route('services');
    }
}
