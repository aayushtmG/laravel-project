@props(['title','imageSrc'])
<div class="h-[300px] border rounded-xl overflow-hidden p-4 relative cursor-pointer group services-group">
    <img src='{{$imageSrc}}' alt="saving image" class="absolute inset-0 -z-10 h-full w-full object-cover  group-hover:scale-110 transition-transform duration-500">
    <div class="absolute top-0 bottom-0 right-0 left-0 bg-black/30 "></div>
    <div class="absolute bottom-5 text-white z-20">
        <h3 class="text-2xl font-bold services-title">{{$title}}</h3>
        <a href="/" class="text-sm hover:text-green-500">Read More></a>
    </div>
</div>