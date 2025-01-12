@extends('layouts.app')
@section('title','Team')
@section('content')
 <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-xl font-bold text-gray-800 mb-8">Management Committee</h1>

        <!-- Central Head -->
        <div class="flex justify-center mb-12 gap-4">
            <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center ">
                <img src="{{$members[0]['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-lg font-bold text-gray-800">{{$members[0]['name']}}</h2>
                <p class="text-sm text-gray-600">{{$members[0]['position']}}</p>
                <a href="mailto:{{$members[0]['email']}}" class="text-blue-500 text-sm">{{$members[0]['email']}}</a>
            </div>
        </div>
        <div class="flex justify-center gap-4">
           @foreach ($members->skip(1) as $member)
                <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center">
                    <img src="{{$member['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h2 class="text-lg font-bold text-gray-800">{{$member['name']}}</h2>
                    <p class="text-sm text-gray-600">{{$member['position']}}</p>
                    <a href="mailto:{{$member['email']}}" class="text-blue-500 text-sm">{{$member['email']}}</a>
                </div>
            @endforeach
        </div>
        </div>
    </div>
@endsection