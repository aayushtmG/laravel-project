<div x-data="{ activeTab: 'news' }" class="w-full">
    <div class="relative flex gap-8 border-b border-gray-200 mb-4">
        <!-- Tabs -->
        <button 
            @click="activeTab = 'news'" 
            class="px-1 py-2 text-sm font-medium transition-colors relative"
            :class="activeTab === 'news' ? 'text-blue-600' : 'text-gray-500 hover:text-gray-700'"
        >
            News
        </button>
        <button 
            @click="activeTab = 'events'"
            class="px-1 py-2 text-sm font-medium transition-colors relative"
            :class="activeTab === 'events' ? 'text-blue-600' : 'text-gray-500 hover:text-gray-700'"
        >
            Events
        </button>
        <!-- Active indicator -->
        <div 
            class="absolute bottom-0 h-0.5 bg-blue-600 transition-transform duration-300 ease-out"
            style="width: 50px;"
            :style="{ transform: `translateX(${activeTab === 'news' ? '0' : '82px'})` }"
        ></div>

    </div>

    <div x-show="activeTab === 'news'" x-transition>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($news as $item)
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['image']))
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $item['created_at']->format('M d, Y') }}</p>
            </div>
            @endforeach

        </div>
    </div>
    <div x-show="activeTab === 'events'" x-transition>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($events as $item)
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['image']))
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm">
                    {{ $item['start_date']->format('M d, Y') }}
                    @if(isset($item['end_date']))
                        - {{ $item['end_date']->format('M d, Y') }}
                    @endif
                </p>
            </div>
            @endforeach

        </div>
    </div>
        {{-- todo: make the link dynamic according to active tab --}}
         <div class="my-4 col-span-2">
            <button class="block mx-auto ">
                <a class="text-sm border px-3 py-1 mx-auto border-gray-500 rounded-md text-gray-700 hover:border-blue-600 hover:bg-blue-600 hover:text-white transition-colors ease-out" href="/">View More</a>
            </button>
          </div> 
</div>