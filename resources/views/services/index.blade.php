@extends('layouts.app')
@section('content')
<div class="grid grid-cols-2 gap-8 my-10">
  @foreach($services as $service)
  <div class="shadow-md p-8">
  <img src="{{asset('/images/uploads/'.$service['image'])}}" alt="{{$service['name']}} image" class="max-w-[300px] mx-auto">
  <h1 class="font-bold">{{$service['name']}} {{$service->id}}</h1>
  <p>{{$service['description']}}</p>
  </div>
  @endforeach
</div>
  <form action="/service/create-service" class="flex flex-col justify-center max-w-[200px] bg-blue-300 p-8 mx-auto" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Add new service</h1>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" />
    <label for="description">description</label>
    <textarea id="description" name="description" >
    </textarea>
    <label for="image">image_url</label>
    <input type="file" id="image" name="image" />
    <button type="submit">Submit</button>
  </form>  
@endsection