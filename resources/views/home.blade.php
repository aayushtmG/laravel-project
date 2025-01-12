@extends('layouts.app')
@section('title','Home')
@section('content')
  @include('components.main-carousel')
  @include('components.main-services')
      {{-- Introduction Section --}}
      <section class="bg-gray-100/50 p-12 container mx-auto rounded-md">
        <div class="flex flex-col gap-10 lg:flex-row  max-w-screen-xl mx-auto">
        <div>
          <h1 class="section-header text-2xl lg:text-4xl">Introduction</h1>
          <p class="text-justify my-2 mt-4">Bhargo Movement Nepal is a community, group and member based co-operative model microfinance institution established on April 03, 1996, registered under Co-Operative Act. 2058. It is situated at Birtamod Municipality Ward NO: 2 of Jhapa District in Eastern Development Region of Nepal. It is dedicated to the social and economic development of the local community by reducing the poverty. It is providing co-operative microfinance services to the members. It is also involving in a variety of social development programs, such as livelihoods, health & environment, and community empowerment. It strives to raise awareness among the poverty-stricken and the downtrodden as well as to establish sustainable development to guarantee basic necessities and achieve self-sufficiency, thus creating a legitimate society. </p> 
        </div>
        <div>
          <img src="/images/ceo-image.jpg" alt="ceo image" class="rounded-md"/>
          <div class="text-center py-2">
              <h3 class="text-2xl font-bold ">Mr. Sangam Bk</h3>
              <p class="text-gray-700">Chief Executive Officer</p>
              <span class="text-gray-700">Mail: ceo@bhargomovementnepal.np</span>
          </div>
        </div></div>
      </section>
      @include('components.organization-profile')
      @include('components.productsServices')
      {{-- our gallery --}}
      <section class="container mx-auto">
          <h1 class="section-header text-2xl lg:text-4xl container mx-auto">Our Gallery</h1>
          <x-carousel-slide :images="['/images/banner-1.jpg','/images/banner.jpg','/images/banner-2.jpg']"/>
      </section>
      {{-- news & events section --}}
      <section class="bg-gray-100/50 ">
        <div class="container mx-auto py-12">
          <h1 class="section-header ">News & Events</h1>
          <x-news-events-tabs />
      </div>
      </section>
      {{-- Notice section --}}
      <section class="container mx-auto">
        <h1 class="section-header">Notice</h1>
        <x-notices />
      </section>
      {{-- help section --}}
      <section class="container mx-auto">
        <h1 class="section-header">This may help you</h1>
        <x-services-detail-block /> 
      </section>
@endsection