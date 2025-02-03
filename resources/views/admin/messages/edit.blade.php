@extends('layouts.admin')
@section('content')
<div class="md:container md:mx-auto px-6 md:px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-slate-600">
    Edit Message 
</h1>
    <a href="{{route('admin.messages.show')}}" class="btn hover:bg-slate-800 hover:text-white">All Messages</a>
  </div>
  <form action="{{route('messages.edit')}}" class=" flex max-md:flex-col-reverse gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
    <h1 class="text-2xl font-semibold text-slate-600">
    Message Information:</h1>
      {{-- name --}}
      <div class="flex flex-col">
      <label for="messages_name">Name:</label> 
      <input type="text" id="messages_name" name="name" class="border border-slate-300 rounded-sm p-2" placeholder="Enter message name" value="{{$message['name']}}">
      @if($errors->has('name'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('name')}}</div> 
      @endif
      </div>
      <div class="flex gap-4 max-md:flex-col-reverse">
        {{-- email --}}
        <div class="flex flex-col w-full">
        <label for="messages_email">Email:</label> 
        <input type="text" id="messages_email" name="email" class="border border-slate-300 rounded-sm p-2" placeholder="Enter email" value="{{$message['email']}}">
        @if($errors->has('email'))
        <div class="text-sm text-red-500 mt-1">*{{$errors->first('email')}}</div> 
        @endif
        </div>
        {{-- position --}}
        <div class="flex flex-col w-full">
        <label for="messages_position">Position:</label> 
        <input type="text" id="messages_position" name="position" class="border border-slate-300 rounded-sm p-2" placeholder="Enter position" value="{{$message['position']}}">
        @if($errors->has('position'))
        <div class="text-sm text-red-500 mt-1">*{{$errors->first('position')}}</div> 
        @endif
        </div>
      </div>
      {{-- message --}}
      <div class="flex flex-col">
        <label for="messages_message">Message Description:</label> 
        <textarea id="messages_message" name="message" class="border border-slate-300 rounded-sm min-h-[200px] p-3"
        placeholder="Enter the messages message here...."
        >{{$message['message']}}</textarea> 
      @if($errors->has('message'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('message')}}</div> 
      @endif
      </div>
    <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Submit</button>
    </div> 
    {{-- image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select message Image:</label>
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/messages/'.$message->image) }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
      <input type="file" id="image-upload"  accept="image/*" onchange="previewImage(event)" name="image">
      <input type="hidden" value="{{$message->id}}" name="id">
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