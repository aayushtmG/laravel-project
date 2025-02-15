@extends('layouts.admin')
@section('content')
   <div class="grid lg:grid-cols-4 gap-4 p-8 text-white">
      {{-- slider --}}
      @foreach ($lists as $item)
      <a  href="{{$item['link']}}" class="">
         <div class="bg-[#212B36] hover:bg-[#212B36]/80 transition-colors  p-4 px-10 rounded-md">
            <span class='text-lg'>{{$item['quantity']}}</span>
            <h2 class="text-xl">{{$item['title']}}</h2>
         </div>
      </a> 
      @endforeach
   </div>
@endSection