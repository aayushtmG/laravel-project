@extends('layouts.app')
@section('title','About Us')
@section('content')
  <div class="container mx-auto text-center my-10 mb-20 space-y-2">
    <h1 class="text-6xl font-bold font-serif">About {{$settings->company_name}}</h1>
    <p class="md:text-2xl text-gray-500">
 {{$page->heading}}
</p>
  </div>
  <div class="container mx-auto bg-gray-50 flex flex-col px-4">
    <img src="{{asset('/images/about/about.png')}}" alt="outreach" class="md:w-3/5 mx-auto my-20">
    <p class="md:text-xl text-gray-800 my-2" style="white-space: pre-wrap">
{{$page->description}}
    </p>
  </div>
@endsection
