@extends('layouts.app')
@section('title','Team')

@section('content')
<div x-data="{ activeTab: 'management' }" class="my-4 container mx-auto lg:min-h-[800px] ">
    <div class="relative flex gap-8 border-b border-gray-200 mb-4">
        <!-- Tabs -->
        <button 
            @click="activeTab = 'management'" 
            class="px-1 py-2 text-sm md:text-xl font-medium transition-colors relative"
            :class="activeTab === 'news' ? 'text-blue-600' : 'text-gray-500 hover:text-gray-700'"
        >
            Management Comittee
        </button>
        <button 
            @click="activeTab = 'board'"
            class="px-1 py-2 text-sm md:text-xl font-medium transition-colors relative"
            :class="activeTab === 'events' ? 'text-blue-600' : 'text-gray-500 hover:text-gray-700'"
        >
            Board Of Directors
        </button>
        <!-- Active indicator -->
        <div 
            class="absolute bottom-0 h-0.5 bg-blue-600 transition-transform duration-300 ease-out w-[200px]"
            style=""
            :style="{ transform: `translateX(${activeTab === 'management' ? '0' : '240px'})` }"
        ></div>
    </div>

    <div x-show="activeTab === 'management'" >
            <div class="max-w-6xl mx-auto py-10">
                @if(count($members) > 0)
                <!-- Central Head -->
                <div class="flex justify-center mb-12 gap-4">
                    <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center min-w-[300px] md:min-h-[250px] ">
                        <img src="/images/teams/management/{{$members->first()['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover object-top">
                        <h2 class="text-lg font-bold text-gray-800">{{$members->first()['name']}}</h2>
                        <p class="text-sm text-gray-600">{{$members->first()['position']}}</p>
                        <a href="mailto:{{$members->first()['email']}}" class="text-blue-500 text-sm">{{$members->first()['email']}}</a>
                    </div>
                </div>
                @endif
                <div class="flex justify-center gap-4  flex-wrap max-md:items-center ">
                @foreach ($members->skip(1) as $member)
                        <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center lg:min-w-[300px] ">
                            <img src="/images/teams/management/{{$member['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover object-top">
                            <h2 class="text-lg font-bold text-gray-800">{{$member['name']}}</h2>
                            <p class="text-sm text-gray-600">{{$member['position']}}</p>
                            <a href="mailto:{{$member['email']}}" class="text-blue-500 text-sm">{{$member['email']}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
    <div x-show="activeTab === 'board'" >
            <div class="max-w-5xl mx-auto py-10">

                @if(count($board)> 0)
                <!-- Central Head -->
                <div class="flex justify-center mb-12 gap-4">
                        <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center min-w-[300px] md:min-h-[250px]">
                        <img src="/images/teams/board/{{$board->first()['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover object-top">
                        <h2 class="text-lg font-bold text-gray-800">{{$board->first()['name']}}</h2>
                        <p class="text-sm text-gray-600">{{$board->first()['position']}}</p>
                        <a href="mailto:{{$board->first()['email']}}" class="text-blue-500 text-sm">{{$board->first()['email']}}</a>
                    </div>
                </div>
                @endif
                <div class="flex justify-center flex-wrap gap-4">
                @foreach ($board->skip(1) as $member)
                        <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center md:min-w-[300px] md:min-h-[250px]">
                            <img src="/images/teams/board/{{$member['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover object-top">
                            <h2 class="text-lg font-bold text-gray-800">{{$member['name']}}</h2>
                            <p class="text-sm text-gray-600">{{$member['position']}}</p>
                            <a href="mailto:{{$member['email']}}" class="text-blue-500 text-sm">{{$member['email']}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
</div>
@endsection