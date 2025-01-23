<div>
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 max-md:place-items-center">
            @foreach($notices as $item)
            <a href="{{route('notices.show',['id'=>$item->id])}}" class="max-sm:w-[90%] sm:min-w-[300px]">
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['image']))
                    <img src="/images/notices/{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $item['created_at']->format('M d, Y') }}</p>
            </div>
            </a>
            @endforeach
        </div>
</div>