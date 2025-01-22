
@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-slate-600">
    Add Members 
</h1>
    <a href="{{route('admin.members.show')}}" class="btn hover:bg-slate-800 hover:text-white">All Members</a>
  </div>
  <form action="{{route('members.edit')}}" class=" flex gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
    <h1 class="text-2xl font-semibold text-slate-600">
    Member Information:</h1>
      {{-- name --}}
      <div class="flex flex-col">
      <label for="member_name">Name:</label> 
      <input type="text" id="member_name" name="name" class="border border-slate-300 rounded-sm p-1" placeholder="Enter Name" value="{{$member->name}}"/>
      @if($errors->has('name'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('name')}}</div> 
      @endif
      </div>
      {{-- Group --}}
      <div class="flex gap-4">
        {{-- email --}}
        <div class="flex flex-col w-full">
        <label for="email">Email:</label> 
        <input type="email" id="email" name="email" class="border border-slate-300 rounded-sm p-1 " placeholder="Enter Email" value="{{$member->email}}"/> 
      @if($errors->has('email'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('email')}}</div> 
      @endif
        </div>
        {{-- contact --}}
        <div class="flex flex-col w-full">
        <label for="contact">Contact:</label> 
        <input type="tel" id="contact" name="contact" class="border border-slate-300 rounded-sm p-1 " 
        value="{{$member->contact}}"
        /> 
      @if($errors->has('contact'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('contact')}}</div> 
      @endif
        </div>
      </div>
      {{-- Group --}}
      <div class="flex gap-4">
        {{-- position --}}
        <div class="flex flex-col w-full">
        <label for="position">Position:</label> 
        <input type="text" id="position" name="position" class="border border-slate-300 rounded-sm p-1 " placeholder="Enter Position" value="{{$member->position}}"/> 
      @if($errors->has('position'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('position')}}</div> 
      @endif
        </div>
        {{-- Department --}}
        <div class="flex flex-col w-full">
        <label for="department">Department:</label> 
        <select  id="department" name="department" class="border border-slate-300 rounded-sm p-1 ">
          <option value="management">Management Comittee</option>
          <option value="board">Board of Directors</option>
        </select>
      @if($errors->has('department'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('department')}}</div> 
      @endif
        </div>
      </div>
    <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Submit</button>
    </div> 
    {{-- image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select Member Image:</label>
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/teams/'.$member->department.'/'.$member->image) }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
      <input type="file" id="image-upload"  accept="image/*" onchange="previewImage(event)" name="image">
      @if($errors->has('image'))
      <div class="text-sm text-red-500 translate-y-4">*{{$errors->first('image')}}</div> 
      @endif
      <input type="hidden" value="{{$member->id}}" name="id">
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