<nav class="bg-blue-500 text-white " >
    <div class="  pl-4  mx-auto"> 
                    {{-- desktop navigation--}}
                    <div>
                        <div class="flex justify-between items-center max-sm:h-16 py-4">
            <!-- Hamburger Button -->
            <div class="block md:hidden">
                <button 
                    id="hamburger-button"
                    class="focus:outline-none"
                    aria-label="Toggle navigation"
                >
                    <span class="border p-2 px-4 rounded-md"><i class="fa-solid fa-bars"></i></span>
                </button>
            </div>
                            <!-- Links -->
                            <div class="">
                                <ul class="hidden md:flex md:items-center nav-links">
                                <li><a href="/" class="px-3 py-2 rounded  nav-links-item" >{{__('nav.home')}}</a></li>
                               <li> <a href="/about" class="px-3 py-2 rounded nav-links-item">{{__('nav.about_us')}}</a></li>
                    <li class="relative">
                        <button 
                            id="desktop-dropdown-button"
                            class="px-3 py-2 rounded nav-links-item inline-flex items-center hover:text-[#00ff00]"
                        >
                            {{__('nav.services')}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul 
                            id="desktop-dropdown-menu" 
                            class="absolute left-0 mt-2 w-52 bg-white text-black rounded-md shadow-lg overflow-hidden max-h-0 transition-[max-height] duration-500 ease-in-out z-30 nav-dropdown-list px-2 "
                        >
                        @foreach($services as $service)
                            <li><a href={{route('services.show',$service->id)}} class="block px-4 py-2 hover:bg-gray-100 border-gray-300 border-b text-base text-gray-600">{{$service['title']}}</a></li>
                        @endforeach
                        </ul>
                    </li>
                               <li> <a href="/team" class="px-3 py-2 rounded nav-links-item">{{__('nav.team')}}</a></li>
                               <li> <a href="/messages" class="px-3 py-2 rounded nav-links-item">{{__('nav.messages')}}</a></li>
                               <li> <a href="/contact" class="px-3 py-2 rounded nav-links-item">{{__('nav.contact_us')}}</a></li>
                                </ul>
                            </div>
                        </div>
@if(Route::is('home'))
    <div class="hidden md:flex items-center  bg-white">
        <div class="bg-blue-500 min-h-full skewed-border ">
            <h1 class=" px-6 py-2 font-bold ">{{__('nav.news')}}</h1>
        </div>
        {{-- simple marquee --}}
{{-- <marquee >
    @foreach($news as $singleNews)
        <a href="/news/{{ $singleNews->id }}" class="text-blue-800 text-base mr-[70%]">
            {{ $singleNews->title }}
        </a>
    @endforeach
</marquee>--}}
        {{-- customized marquee --}}
<div class="marquee">
    @foreach($news as $singleNews)
  <div class="marquee-content-container">
    <div class="marquee-content">
        <a href="/news/{{ $singleNews->id }}" class="text-red-500 hover:text-blue-800 text-base mr-[70%]">
            {{ $singleNews->title }}
        </a>
        </div>
  </div>
    @endforeach
</div>
    </div>                         
@endif 
            </div>
        <!-- mobile navigation -->
        <div 
            id="mobile-menu" 
            class="overflow-hidden max-h-0 transition-[max-height] duration-500 ease-in-out md:hidden"
        >
            <ul class="flex flex-col">
                <li><a href="/" class="block px-4 py-2 nav-links-item">{{__('nav.home')}}</a></li>
                <li><a href="/about" class="block px-4 py-2 nav-links-item">{{__('nav.about_us')}}</a></li>
                <li>
                    <div class="relative">
                        <button 
                            id="mobile-dropdown-button"
                            class="flex w-full px-4 py-2 text-left nav-links-item"
                        >
{{__('nav.services')}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul 
                            id="mobile-dropdown-menu"
                            class="overflow-hidden w-4/5 ml-4 max-h-0 transition-[max-height] duration-500 ease-in-out nav-dropdown-list"
                        >
                            @foreach($services as $service)
                            <li><a href={{route('services.show',$service->id)}}  class="block px-4 py-2 hover:bg-gray-100 border-gray-300 border-b text-base">{{$service['title']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li><a href="/team" class="block px-4 py-2 nav-links-item">{{__('nav.team')}}</a></li>
                <li><a href="/messages" class="block px-4 py-2 nav-links-item">{{__('nav.messages')}}</a></li>
                <li><a href="/contact" class="block px-4 py-2 nav-links-item">{{__('nav.contact_us')}}</a></li>
            </ul>
        </div>
    </div>
 </nav>

<script>
    // hamburger menu toggle
    const hamburgerButton = document.getElementById('hamburger-button');
    const mobileMenu = document.getElementById('mobile-menu');

    hamburgerButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('max-h-0')
        mobileMenu.classList.toggle('max-h-screen')
    });

    // Mobile Dropdown Toggle
    const mobileDropdownButton = document.getElementById('mobile-dropdown-button');
    const mobileDropdownMenu = document.getElementById('mobile-dropdown-menu');

    mobileDropdownButton.addEventListener('click', (e) => {
        e.stopPropagation();
        mobileDropdownMenu.classList.toggle('max-h-0');
        mobileDropdownMenu.classList.toggle('max-h-[350px]');
    });

    // Desktop Dropdown Toggle
    const desktopDropdownButton = document.getElementById('desktop-dropdown-button');
    const desktopDropdownMenu = document.getElementById('desktop-dropdown-menu');

    desktopDropdownButton.addEventListener('click', (e) => {
        e.stopPropagation();
        desktopDropdownMenu.classList.toggle('max-h-0');
        desktopDropdownMenu.classList.toggle('max-h-[350px]');
    });

    // Close menus if clicking outside
    document.addEventListener('click', () => {
        mobileDropdownMenu.classList.add('max-h-0');
        mobileDropdownMenu.classList.remove('max-h-[350px]');

        desktopDropdownMenu.classList.add('max-h-0');
        desktopDropdownMenu.classList.remove('max-h-[350px]');
    });

    // Prevent closing menus if clicking inside
    document.querySelectorAll('#mobile-menu, #desktop-dropdown-menu').forEach((menu) => {
        menu.addEventListener('click', (e) => e.stopPropagation());
    });
    //script for marquee
    const marqueeElements = document.querySelectorAll('.marquee-content');
const marqueeElementsContainer = document.querySelectorAll('.marquee-content-container');
marqueeElements.forEach(element => {
    element.addEventListener('mouseover',function(){
              marqueeElementsContainer.forEach(el => {
                el.style.animationPlayState ='paused'
              })
})
   element.addEventListener('mouseout',function(){
              marqueeElementsContainer.forEach(el => {
                el.style.animationPlayState ='running'
              })
})
})
</script>

<style>
        .marquee {
                    width: 100%;
                    overflow: hidden;
                    white-space: nowrap;
                    box-sizing: border-box;
        }
        .marquee-content-container{
        display: inline-block;
        min-width:100%;
        animation: marquee 50s linear infinite;
        margin-right:20px;
        }
        .marquee-content {
            background-color: white;
            padding: 5px;
          display: inline-block;
        }
         /*controlling marquee speed according to viewport  */
        @media (max-width:900px){
            .marquee-content-container{
                margin-right:20px;
                animation: marquee 30s linear infinite;
            }
        }
        @keyframes marquee {
            from {
                transform: translateX(110%);
            }
            to {
                transform: translateX(-110%);
            }
        }
    </style>