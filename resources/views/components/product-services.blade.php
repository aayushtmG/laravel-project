
  <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
@foreach($services as $service)
<div class="h-[300px] border rounded-xl overflow-hidden p-4 relative cursor-pointer group services-group">
    <img src='/images/services/{{$service->image}}' alt="saving image" class="absolute inset-0 -z-10 h-full w-full object-cover  group-hover:scale-110 transition-transform duration-500">
    <div class="absolute top-0 bottom-0 right-0 left-0 bg-black/30 "></div>
    <div class="absolute bottom-5 text-white z-20">
        <h3 class="text-2xl font-bold services-title">{{$service->title}}</h3>
        <a href="{{route('services.show',['id'=>$service->id])}}" class="text-sm hover:text-green-500">Read More></a>
    </div>
</div>
@endforeach
</div>