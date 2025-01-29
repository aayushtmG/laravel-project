<div class="flex gap-4  overflow-auto py-6 flex-grow">
@foreach($albums as $album)
<a href="{{route('gallery.get',['id'=>$album->id])}}">
<div class="h-[300px] min-w-[250px] lg:min-w-[300px]  border rounded-xl overflow-hidden p-4 relative cursor-pointer group services-group">
<img src="{{ asset('images/album/' . $album->name . '/' . $album->thumbnail_image) }}" 
     alt="thumbnail image"
     class="absolute inset-0 -z-10 h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">

    <div class="absolute top-0 bottom-0 right-0 left-0 bg-black/30 "></div>
    <div class="absolute bottom-5 text-white z-20">
        <h3 class="text-2xl font-bold services-title">{{$album->name}}</h3>
        <a href="{{route('gallery.get',['id'=>$album->id])}}" class="text-sm hover:text-green-500">Show All></a>
    </div>
</div>
</a>
@endforeach
</div>