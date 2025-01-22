@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-slate-600">
    Add Events 
</h1>
    <a href="{{route('admin.events.show')}}" class="btn hover:bg-slate-800 hover:text-white">All Events</a>
  </div>
  <form action="{{route('events.create')}}" class=" flex gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
    <h1 class="text-2xl font-semibold text-slate-600">
    Event Information:</h1>
      {{-- title --}}
      <div class="flex flex-col">
      <label for="events_title">Event Title:</label> 
      <input type="text" id="events_title" name="title" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Events Title" value="{{old('title')}}">
      @if($errors->has('title'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('title')}}</div> 
      @endif
      </div>
      {{-- start and end date --}}
      <div class="flex gap-4">
        <div class="flex flex-col w-full">
        <label for="events_start_date">Event Start Date:</label> 
        <input type="date" id="events_start_date" name="start_date" class="border border-slate-300 rounded-sm p-2" value="{{old('start_date')}}">
        </div>
        <div class="flex flex-col w-full">
        <label for="events_end_date">Event End Date:</label> 
        <input type="date" id="events_end_date" name="end_date" class="border border-slate-300 rounded-sm p-2" value="{{old('end_date')}}">
        </div>
      </div>
      {{-- description --}}
      <div class="flex flex-col">
        <label for="events_description">Event Description:</label> 
        <textarea id="events_description" name="description" class="border border-slate-300 rounded-sm min-h-[200px] p-3"
        placeholder="Enter the events description here...."
        >{{old('description')}}</textarea> 
      @if($errors->has('description'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('description')}}</div> 
      @endif
      </div>
    <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Submit</button>
    </div> 
    {{-- image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select Event Image:</label>
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/icons/no-image.png') }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
      <input type="file" id="image-upload"  accept="image/*" onchange="previewImage(event)" name="image">
      @if($errors->has('image'))
      <div class="text-sm text-red-500 translate-y-3">*{{$errors->first('image')}}</div> 
      @endif
    </div>
  </form>  
</div>
@endsection 
@section('scripts')
   <script>
   function previewImage(event){
    const input = event.target
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
@section('styles')
   <style>
      .image-preview-container {
         display: flex;
         flex-wrap: wrap;
         gap: 10px;
         margin-top: 10px;
      }

      .image-preview {
         position: relative;
         width: 100px;
         height: 100px;
         border: 2px solid #ddd;
         border-radius: 5px;
         overflow: hidden;
         display: flex;
         justify-content: center;
         align-items: center;
         background-color: #f7f7f7;
      }

      .image-preview img {
         width: 100%;
         height: 100%;
         object-fit: cover;
      }

      .image-preview button {
         position: absolute;
         top: 5px;
         right: 5px;
         background: red;
         color: white;
         border: none;
         border-radius: 50%;
         width: 20px;
         height: 20px;
         font-size: 12px;
         cursor: pointer;
      }

      .image-preview button:hover {
         background: darkred;
      }
   </style>
   @endsection