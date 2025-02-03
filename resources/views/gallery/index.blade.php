@extends('layouts.app')
@section('title','Gallery')
@section('content')
<section class="min-h-screen">
  <h1 class="text-4xl font-semibold text-slate-700 text-center my-6 underline">All Albums</h1>
  <div class="flex  container gap-8 flex-wrap mx-auto">
    @foreach ($albums as $item)
            <a href="{{route('gallery.get',['id'=>$item->id])}}" class="w-full max-w-sm hover:scale-110 transition-transform">
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['thumbnail_image']))
                    <img src="{{asset('/images/albums/'.$item->name.'/'.$item->thumbnail_image)}}" alt="{{ $item->name }}" class="w-full h-48 object-cover object-center mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['name'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $item['created_at']->format('M d, Y') }}</p>
            </div>
            </a>
    @endforeach
  </div>
</section>
@endsection
