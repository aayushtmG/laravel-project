
@extends('layouts.admin')
@section('content')
<div class="md:container md:mx-auto px-6 md:px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-slate-600">
    Email Inquiry
</h1>
    <a href="{{route('admin.inquiry.all')}}" class="btn hover:bg-slate-800 hover:text-white">All Inquiries</a>
  </div>
  <div>
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
      {{-- name --}}
      <div class="flex gap-2">
        <span class="font-semibold">Name:</span> 
        <h1>{{$inquiry->name}}</h1>  
      </div>
      {{-- email --}}
      <div class="flex gap-2">
        <span class="font-semibold">Email:</span> 
        <h1>{{$inquiry->email}}</h1>  
      </div>
      {{-- message --}}
      <div class="flex gap-2">
        <span class="font-semibold">Message:</span> 
        <div class="bg-gray-200 p-4 rounded-md max-w-[80%] ">
          <p class="whitespace-pre-line ">{{$inquiry->message}}</p>  
        </div>
      </div>
     <a href="mailto:{{$inquiry->email}}"><button type="button"  class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Reply</button></a>
    </div> 
  </div>
</div>
@endsection 