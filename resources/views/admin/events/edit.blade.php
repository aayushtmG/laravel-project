
@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-slate-600">
    Edit Event 
</h1>
    <a href="{{route('admin.events.show')}}" class="btn hover:bg-slate-800 hover:text-white">All Events</a>
  </div>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
  <form action="{{route('events.edit')}}" class=" flex gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
    <h1 class="text-2xl font-semibold text-slate-600">
    Event Information:</h1>
      {{-- title --}}
      <div class="flex flex-col">
      <label for="event_title">Event Title:</label> 
      <input type="text" id="event_title" name="title" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Event Title" value='{{$event->title}}'>
      </div>
      {{-- description --}}
      <div class="flex flex-col">
        <label for="event_description">Event Description:</label> 
        <textarea id="event_description" name="description" class="border border-slate-300 rounded-sm min-h-[200px] p-3"
        placeholder="Enter the event description here...."
        >{{$event->description}}</textarea> 
      </div>
    <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Submit</button>
    </div> 
    {{-- image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select event Image:</label>
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/events/'.$event->image) }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
      <input type="file" id="image-upload"  accept="image/*" onchange="previewImage(event)" name="image">
      <input type="hidden" value="{{$event->id}}" name="id">
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