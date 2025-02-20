@extends('layouts.app')
@section('title','News & Events')
@section('content')
<section class="min-h-screen">
  <h1 class="text-4xl font-semibold text-slate-700 text-center my-6 underline">{{__('home.news')}} & {{__('home.events')}}</h1>
  <div class="flex  container gap-8 flex-wrap mx-auto">
    @foreach ($news as $item)
            <a href="{{route('news.show',['id'=>$item->id])}}" class="w-full max-w-sm hover:scale-110 transition-transform">
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['image']))
                    <img src="/images/news/{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover object-center mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $item['created_at']->format('M d, Y') }}</p>
            </div>
            </a>
    @endforeach
    @foreach ($events as $item)
            <a href="/events/{{$item['id']}}" class="w-full max-w-sm hover:scale-110 transition-transform">
            <div class="bg-white p-4 rounded shadow">
                @if(isset($item['image']))
                    <img src="/images/events/{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover object-center mb-4">
                @endif
                <h3 class="font-bold text-lg">{{ $item['title'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $item['created_at']->format('M d, Y') }}</p>
            </div>
            </a>
    @endforeach
  </div>
</section>
@endsection
