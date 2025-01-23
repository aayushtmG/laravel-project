@extends('layouts.app')
@section('title','Messages')
@section('content')
<div class="container mx-auto px-4 space-y-20 my-10">
  <h1 class="text-4xl text-center text-gray-600 font-bold my-4">Messages from members</h1>
    @foreach ($messages as $index => $message)
        <div class="flex flex-col md:flex-row {{ $index % 2 == 0 ? 'md:flex-row-reverse' : '' }} items-center gap-6 mb-10">
            <!-- Image Section -->
            <div class="w-full md:w-1/2">
                <img src="/images/messages/{{ $message['image'] }}" alt="{{ $message['name'] }}" class="rounded-lg shadow-lg w-3/4 h-auto  mx-auto">
            </div>

            <!-- Content Section -->
            <div class="w-full md:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800">{{ $message['name'] }}</h2>
                <h2 class="text-gray-800 md:text-base font-semibold">{{$message['position']}}</h2>
                <span class="text-blue-500 ">{{$message['email']}}</span>
                <p class="text-gray-600 text-justify mt-4">{{$message['message']}}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
