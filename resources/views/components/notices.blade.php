<div class="grid gap-4 sm:grid-cols-2">
    @foreach ($notices as $item)
    <a href="/">
        <div class="shadow-md p-2 border hover:bg-black/10 rounded-lg cursor-pointer flex flex-col">
            <h3 class="text-gray-800 text-lg ">{{$item['title']}}</h3>
            <span class="text-sm text-gray-600">{{$item['created_at']}}</span>
        </div>
    </a>
    @endforeach
         <div class="my-4 col-span-2">
            <button class="block mx-auto ">
                <a class="text-sm border px-3 py-1 mx-auto border-gray-500 rounded-md text-gray-700 hover:border-blue-600 hover:bg-blue-600 hover:text-white transition-colors ease-out" href="/">View More</a>
            </button>
          </div> 
</div>