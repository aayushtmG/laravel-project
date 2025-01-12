<div class="grid gap-6  md:grid-cols-2">
    @foreach($services as $service)
        <a href={{$service['link']}} class="border hover:border-blue-500 hover:scale-105 transition-transform ease-out rounded-md ">
            <div class="flex flex-col p-6 shadow-md  border hover:bg-black/5 rounded-lg cursor-pointer gap-5 h-full">
                <img src={{$service['icon']}} alt={{$service['name']}} class="w-24 mx-auto">           
                <h1 class="text-2xl">{{$service['name']}}</h1>
                <p class="text-sm text-gray-700">{{$service['description']}}</p>
            </div>
        </a>   
    @endforeach
</div>