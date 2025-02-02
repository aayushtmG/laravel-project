@extends('layouts.app')
@section('title',$title)
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 ">
        <!-- Service Cover Image -->
        <div class="col-span-2 space-y-4">
            <img src="{{ asset('/images/services/' . $service->image) }}" alt="{{ $service->title }}" class="w-full rounded-lg shadow-lg">
            <!-- Service Details -->
            <h1 class="text-2xl font-bold mb-4">{{ $service->name }}</h1>
            <p class="text-gray-700 mb-6 whitespace-pre-line">{{ $service->description }}</p>
        </div>
        <div class="shadow-md min-h-[300px] max-md:col-span-2 max-w-[300px] h-max mx-auto p-8 px-12 rounded-md">
            <!-- Related Services -->
            <h2 class="text-xl font-semibold mb-2 tracking-wide text-black/70">Related Services</h2>
            <ul class="space-y-2 list-disc marker:text-blue-500">
                @if($relatedServices->isEmpty())
                  <p class="text-black/40 font-bold text-base">No related services</p> 
                @endif
                @foreach($relatedServices as $related)
                    <li>
                        <a href="{{ route('services.show', $related->id) }}" class="text-blue-400 hover:underline text-base">
                            {{ $related->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
