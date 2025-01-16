@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Service Cover Image -->
        <div class="col-span-2 space-y-4">
            <img src="{{ asset('/images/uploads/' . $service->image) }}" alt="{{ $service->name }}" class="w-full rounded-lg shadow-lg">

            <!-- Service Details -->
            <h1 class="text-2xl font-bold mb-4">{{ $service->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $service->description }}</p>
        </div>

        <div class="shadow-md min-h-[300px] max-w-[300px] h-max p-8 px-12 rounded-md">
            <!-- Related Services -->
            <h2 class="text-xl font-semibold mb-2 tracking-wide text-black/70">Related Services</h2>
            <ul class="space-y-2 list-disc marker:text-blue-500">
                @foreach($relatedServices as $related)
                    <li>
                        <a href="{{ route('services.show', $related->id) }}" class="text-blue-400 hover:underline text-base">
                            {{ $related->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
