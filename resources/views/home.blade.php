@extends('layouts.app')
@section('title','Home')
@section('content')
  @include('components.main-carousel')
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
          <h1 class="section-header text-2xl lg:text-4xl">Introduction</h1>
          <p class="text-justify my-2 mt-4">Bhargo Movement Nepal is a community, group and member based co-operative model microfinance institution established on April 03, 1996, registered under Co-Operative Act. 2058. It is situated at Birtamod Municipality Ward NO: 2 of Jhapa District in Eastern Development Region of Nepal. It is dedicated to the social and economic development of the local community by reducing the poverty. It is providing co-operative microfinance services to the members. It is also involving in a variety of social development programs, such as livelihoods, health & environment, and community empowerment. It strives to raise awareness among the poverty-stricken and the downtrodden as well as to establish sustainable development to guarantee basic necessities and achieve self-sufficiency, thus creating a legitimate society. </p> 
        </div>
        <div>
          <img src="/images/news/asdf.jpg" alt="ceo image" class="rounded-md"/>
          <div class="text-center py-2">
              <h3 class="text-2xl font-bold ">Mr. Sangam Bk</h3>
              <p class="text-gray-700">Chief Executive Officer</p>
              <span class="text-gray-700">Mail: ceo@bhargomovementnepal.np</span>
          </div>
        </div></div>
      </section>
      @include('components.organization-profile')
<section class="px-4 container mx-auto">
  <h1 class="section-header text-2xl lg:text-4xl">Products & Services</h1>
      <x-product-services />
</section>
      {{-- our gallery --}}
      <section class="container mx-auto">
          <h1 class="section-header text-2xl lg:text-4xl container mx-auto">Our Gallery</h1>
          <x-carousel-slide :images="['/images/banner-1.jpg','/images/banner.jpg','/images/banner-2.jpg']"/>
      </section>
      {{-- news & events section --}}
      <section class="bg-gray-100/50 ">
        <div class="container mx-auto py-12">
          <div class="flex justify-between max-md:items-center items-end ">
            <h1 class="section-header">News & Events</h1>
          <a href="{{route('news-events')}}" class="max-md:text-xs text-sm btn hover:bg-slate-800 hover:text-white ">View all</a>
          </div>
          <x-news-events-tabs />
      </div>
      </section>
      {{-- Notice section --}}
      <section class="container mx-auto">
        <div class="flex justify-between  max-md:items-center items-end">
        <h1 class="section-header">Notice</h1>
          <a href="{{route('notices')}}" class="max-md:text-xs text-sm btn hover:bg-slate-800 hover:text-white ">View all</a>
        </div>
        <x-notices />
      </section>
      {{-- help section --}}
      <section class="container mx-auto">
        <h1 class="section-header">This may help you</h1>
        <x-services-detail-block /> 
      </section>
@endsection