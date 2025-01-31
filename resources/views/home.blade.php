@extends('layouts.app')
@section('title','Home')
@section('content')
  {{-- @include('components.main-carousel') --}}
  <x-main-carousel-slide />
  @include('components.main-services')
  <!-- Modal -->
  <div x-show='showModal' x-data='{showModal : true,currentNoticeIndex:0,notices: @json($notices)}' class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" @click='showModal=false'>
      <div class="bg-white p-1 rounded-lg max-w-[90%] xl:max-w-screen-lg max-h-screen w-full overflow-y-scroll"  @click.stop>
          <div class="flex justify-end">
              <button @click="showModal = false" class="text-gray-500"><i class="fa-solid fa-xmark 2xl:text-2xl text-lg  mr-4"></i></button>
          </div>
        <div class="w-full">
              <!-- Display current notice image -->
              <img :src="`/images/notices/${notices[currentNoticeIndex].image}`" 
                  :alt="notices[currentNoticeIndex].name" 
                  class="w-full h-auto rounded-lg" 
                  @click.stop="if(currentNoticeIndex == notices.length-1){
                    showModal = false
                  }else{
                    currentNoticeIndex = (currentNoticeIndex + 1)
                  }"/>
          </div>
      </div>
  </div>
      {{-- Introduction Section --}}
      <section class="bg-gray-100/50 p-12 container mx-auto rounded-md">
        <div class="flex flex-col gap-10 lg:flex-row  max-w-screen-xl mx-auto">
          <div>
            <h1 class="section-header text-2xl lg:text-4xl">{{__('home.introduction')}}</h1>
            <p class="text-justify my-2 mt-4" style="white-space: pre-wrap">{{$settings->company_introduction}}</p> 
          </div>
          <div class="w-ful flex flex-col justify-center items-center">
            <img src="{{asset('/images/teams/management/'.$ceo->image)}}" alt="ceo image" class="rounded-md max-w-[300px] "/>
            <div class="text-center py-2">
                <h3 class="text-2xl font-bold ">Mr. {{$ceo->name}}</h3>
                <p class="text-gray-700">Chief Executive Officer</p>
                <span class="text-gray-700">Mail: {{$ceo->email}}</span>
            </div>
          </div>
        </div>
      </section>
      @include('components.organization-profile')
<section class="px-4 container mx-auto">
  <h1 class="section-header text-2xl lg:text-4xl">{{__('home.products')}} & {{__('home.services')}}</h1>
      <x-product-services />
</section>
      {{-- our gallery --}}
      <section class="container mx-auto overflow-auto">
          <h1 class="section-header text-2xl lg:text-4xl container mx-auto"> {{__('home.our')}} {{__('home.gallery')}}</h1>
          <x-gallery />
      </section>
      {{-- news & events section --}}
      <section class="bg-gray-100/50 ">
        <div class="container mx-auto py-12">
          <div class="flex justify-between max-md:items-center items-end ">
            <h1 class="section-header">{{__('home.news')}} & {{__('home.events')}}</h1>
          <a href="{{route('news-events')}}" class="max-md:text-xs text-sm btn hover:bg-slate-800 hover:text-white ">{{__('home.viewall')}}</a>
          </div>
          <x-news-events-tabs />
      </div>
      </section>
      {{-- Notice section --}}
      <section class="container mx-auto">
        <div class="flex justify-between  max-md:items-center items-end">
        <h1 class="section-header">{{__('home.notices')}}</h1>
          <a href="{{route('notices')}}" class="max-md:text-xs text-sm btn hover:bg-slate-800 hover:text-white ">{{__('home.viewall')}}</a>
        </div>
        <x-notices />
      </section>
      {{-- help section --}}
      <section class="container mx-auto">
        <h1 class="section-header">{{__('home.this may help you')}}</h1>
        <x-services-detail-block /> 
      </section>
@endsection