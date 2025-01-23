<div x-data="{ activeTab: 'news' }" class="w-full  min-h-[400px]">
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

    <div x-show="activeTab === 'news'" >
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($news as $item)
            <a href="{{route('news.show',['id'=>$item->id])}}">
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['image']))
                    <img src="/images/news/{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $item['created_at']->format('M d, Y') }}</p>
            </div>
            </a>
            @endforeach
        </div>
    </div>
    <div x-show="activeTab === 'events'" >
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($events as $item)
            <a href="{{route('event.show',['id'=>$item->id])}}">
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['image']))
                    <img src="/images/events/{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm">
                    {{ $item['start_date']->format('M d, Y') }}
                    @if(isset($item['end_date']))
                        - {{ $item['end_date']->format('M d, Y') }}
                    @endif
                </p>
            </div>
        </a>
            @endforeach

        </div>
    </div>
</div>