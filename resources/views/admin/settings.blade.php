@extends('layouts.admin')
@section('content')
<section>
  <form action="{{route('settings.update')}}">
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
    <h1 class="text-2xl font-semibold text-slate-600">
    All Settings:</h1>
      {{-- title --}}
      <div class="flex flex-col">
      <label for="news_title">Webite Logo:</label> 
      <input type="text" id="news_title" name="title" class="border border-slate-300 rounded-sm p-2" placeholder="Enter News Title" value="{{old('title')}}">
      @if($errors->has('title'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('title')}}</div> 
      @endif
      </div>

  </form>
</section>
@endSection