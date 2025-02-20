@extends('layouts.admin')
@section('content')
<div class="md:container md:mx-auto px-6 md:px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-slate-600">
    Edit About Page 
</h1>
  </div>
  <form action="{{route('admin.about.post')}}" class=" flex max-md:flex-col-reverse gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
    {{-- <h1 class="text-2xl font-semibold text-slate-600">
    about Information:</h1> --}}
      {{-- title --}}
      <div class="flex flex-col">
      <label for="about_heading">About Heading:</label> 
      <input type="text" id="about_heading" name="heading" class="border border-slate-300 rounded-sm p-2" placeholder="Enter About Page Heading" value='{{$page->heading}}'>
      @if($errors->has('heading'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('heading')}}</div> 
      @endif
      </div>
      {{-- description --}}
      <div class="flex flex-col">
        <label for="about_description">About Page Description:</label> 
        <textarea id="about_description" name="description" class="border border-slate-300 rounded-sm min-h-[300px] p-3"
        placeholder="Enter the about description here...."
        >{{$page->description}}</textarea> 
      @if($errors->has('description'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('description')}}</div> 
      @endif
      </div>
    <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Submit</button>
    </div> 
    {{-- image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select Page Image:</label>
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/about/'.$page->image) }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
      <input type="file" id="image-upload"  accept="image/*" onchange="previewImage(event)" name="image">
      @if($errors->has('image'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('image')}}</div> 
      @endif
    </div>
  </form>  
</div>
@endsection 
@section('scripts')
   <script>
   function previewImage(event){
    const input =event.target
    const preview = document.getElementById('image_preview')
    if(input.files && input.files[0]){
      const reader = new FileReader();
      reader.onload= function(e){
        preview.src = e.target.result;
      }
      reader.readAsDataURL(input.files[0])
    }
    }
   </script>
  @endsection