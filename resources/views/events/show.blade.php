@extends('layouts.app')
@section('title',$title)
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Event Cover Image -->
        <div class="col-span-2 space-y-4">
            <img src="{{ asset('/images/events/' . $event->image) }}" alt="{{ $event->title }}" class=" mx-auto min-h-[600px] rounded-lg shadow-lg max-w-screen-md">
            <!-- event Details -->
            <h1 class="text-2xl font-bold mb-4">{{ $event->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $event->description }}</p>
        </div>

        <div class="shadow-md min-h-[300px] max-w-[300px] h-max p-8 px-12 rounded-md">
            <!-- Related events -->
            <h2 class="text-xl font-semibold mb-2 tracking-wide text-black/70">Related event</h2>
            <ul class="space-y-2 list-disc marker:text-blue-500">
              @if ($relatedEvents->isEmpty())
                  <p class="text-black/40 font-bold text-base">No related events</p> 
              @endif
                @foreach($relatedEvents as $related)
                    <li>
                        <a href="{{ route('event.show', $related->id) }}" class="text-blue-400 hover:underline text-base">
                            {{ $related->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
