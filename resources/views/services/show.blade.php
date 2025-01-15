@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Service Cover Image -->
        <div class="col-span-2">
            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full rounded-lg shadow-lg">
        </div>

        <!-- Service Details -->
        <div>
            <h1 class="text-2xl font-bold mb-4">{{ $service->title }}</h1>
            <p class="text-gray-700 mb-6">{{ $service->description }}</p>

            <!-- Related Services -->
            <h2 class="text-xl font-semibold mb-2">Related Services</h2>
            <ul class="space-y-2">
                @foreach($relatedServices as $related)
                    <li>
                        <a href="{{ route('services.show', $related->id) }}" class="text-blue-500 hover:underline">
                            {{ $related->title }}
                        </a>
                        <small class="text-gray-500">({{ $related->available_until }})</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
