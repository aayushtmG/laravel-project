@extends('layouts.app')
@section('title','Team')

@section('content')
<div x-data="{ activeTab: 'management' }" class="my-4 container mx-auto lg:min-h-[800px] ">
    <div class="relative flex gap-8 border-b border-gray-200 mb-4 md:px-2">
        <!-- Tabs -->
        <button 
            @click="activeTab = 'management'" 
            class="px-1 py-2 text-sm md:text-xl md:min-w-[225px] text-start font-medium transition-colors relative"
            :class="activeTab === 'news' ? 'text-blue-600' : 'text-gray-500 hover:text-gray-700'"
        >
            {{__('team.management_committee')}}
        </button>
        <button 
            @click="activeTab = 'board'"
            class="px-1 py-2 text-sm md:text-xl md:min-w-[225px] text-start font-medium transition-colors relative"
            :class="activeTab === 'events' ? 'text-blue-600' : 'text-gray-500 hover:text-gray-700'"
        >
        {{__('team.board_of_directors')}}
        </button>
        <!-- Active indicator -->
        <div 
            class="absolute bottom-0 h-0.5 bg-blue-600 transition-transform duration-300 ease-out w-[180px] md:w-[230px]"
            {{-- :style="{ transform: `translateX(${activeTab === 'management' ? '0' : '240px'})` }" --}}
:style="window.innerWidth < 768 ? `transform: translateX(${activeTab === 'management' ? '0' : '180px'})` : `transform: translateX(${activeTab === 'management' ? '0' : '250px'})`"
        ></div>
    </div>

    <div x-show="activeTab === 'management'" >
            <div class="max-w-6xl mx-auto py-10">
                {{-- top  --}}
                <!-- Central Head -->
                <div class="flex justify-center mb-12 gap-4">
                    <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center min-w-[300px] md:min-h-[250px] ">
                        <img src="/images/teams/management/{{$membersTop['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover object-top">
                        <h2 class="text-lg font-bold text-gray-800">{{$membersTop['name']}}</h2>
                        <p class="text-sm text-gray-600">{{$membersTop['position']}}</p>
                        <a href="mailto:{{$membersTop['email']}}" class="text-blue-500 text-sm">{{$membersTop['email']}}</a>
                    </div>
                </div>
                <div class="flex justify-center gap-4  flex-wrap max-md:items-center ">
                @foreach ($members as $member)
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
                <!-- Central Head -->
                <div class="flex justify-center mb-12 gap-4">
                        <div class="hover:bg-blue-50 rounded-lg p-6 shadow-md text-center min-w-[300px] md:min-h-[250px]">
                        <img src="/images/teams/board/{{$boardsTop['image']}}" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover object-top">
                        <h2 class="text-lg font-bold text-gray-800">{{$boardsTop['name']}}</h2>
                        <p class="text-sm text-gray-600">{{$boardsTop['position']}}</p>
                        <a href="mailto:{{$boardsTop['email']}}" class="text-blue-500 text-sm">{{$boardsTop['email']}}</a>
                    </div>
                </div>
                <div class="flex justify-center flex-wrap gap-4">
                @foreach ($board as $member)
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