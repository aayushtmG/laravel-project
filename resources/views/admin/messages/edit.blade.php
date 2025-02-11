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
      <input type="text" id="messages_name" name="name" class="border border-slate-300 rounded-sm p-2" placeholder="Enter message name" value="{{$message['name']}}" disabled>
      @if($errors->has('name'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('name')}}</div> 
      @endif
      </div>
      <div class="flex gap-4 max-md:flex-col-reverse">
        {{-- email --}}
        <div class="flex flex-col w-full">
        <label for="messages_email">Email:</label> 
        <input type="text" id="messages_email" name="email" class="border border-slate-300 rounded-sm p-2" placeholder="Enter email" value="{{$message['email']}}" disabled>
        @if($errors->has('email'))
        <div class="text-sm text-red-500 mt-1">*{{$errors->first('email')}}</div> 
        @endif
        </div>
        {{-- position --}}
        <div class="flex flex-col w-full">
        <label for="messages_position">Position:</label> 
        <input type="text" id="messages_position" name="position" class="border border-slate-300 rounded-sm p-2" placeholder="Enter position" value="{{$message['position']}}" disabled>
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
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset($message->image) }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
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