
@extends('layouts.app')
@section('title',$title)
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- notice Cover Image -->
        <div class="col-span-2 space-y-4">
            <img src="{{ asset('/images/notices/' . $notice->image) }}" alt="{{ $notice->title }}" class=" mx-auto min-h-[600px] rounded-lg shadow-lg max-w-screen-md">
            <!-- notice Details -->
            <h1 class="text-2xl font-bold mb-4">{{ $notice->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $notice->description }}</p>
        </div>

        <div class="shadow-md min-h-[300px] max-w-[300px] h-max p-8 px-12 rounded-md">
            <!-- Related notices -->
            <h2 class="text-xl font-semibold mb-2 tracking-wide text-black/70">Other notices</h2>
            <ul class="space-y-2 list-disc marker:text-blue-500">
              @if ($otherNotices->isEmpty())
                  <p class="text-black/40 font-bold text-base">No Other Notices</p> 
              @endif
                @foreach($otherNotices as $item)
                    <li>
                        <a href="{{ route('notices.show', $item->id) }}" class="text-blue-400 hover:underline text-base">
                            {{ $item->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
