<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function show($id){
        $service = Service::findOrFail($id);

        $relatedService = Service::where('id','!=',$id)->get();

        return view('services.show',compact('service','relatedService'));
    }
}
