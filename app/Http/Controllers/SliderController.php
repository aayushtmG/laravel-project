<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
public function index(){
    $images = Slider::all();
    return view('admin.slider',compact('images'));
}
public function deleteSlider(Request $request){
  $id = $request->id;
  $slider_image = Slider::find($id);
  $slider_image->delete();
  return redirect()->route('sliders.get'); 
}
public function postSlider(Request $request){
    if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $name = explode('.',$file->getClientOriginalName())[0];
            $filename = $name  . '.' . $extension;
            $file->move(public_path('/images/sliders'), $filename);
            Slider::create([
              'image'=> $filename
           ]);
    }
    return redirect()->route('sliders.get');
}

}
