<nav class="bg-blue-500 text-white " x-data="{ isOpen: true }">
    <div class="  pl-4  mx-auto">
                    {{-- desktop navigation --}}
                    <div>
                        <div class="flex justify-between items-center max-sm:h-16 py-4">
                            <!-- Hamburger Menu Button -->
                            <div class="block md:hidden">
                                <button 
                                    @click="isOpen = !isOpen" 
                                    class="focus:outline-none" 
                                    aria-label="Toggle navigation"
                                >
                                    <span class="border p-2 px-4 rounded-md"><i class="fa-solid fa-bars"></i></span>
                                </button>
                            </div>
                            <!-- Links -->
                            <div class="">
                                <ul class="hidden md:flex md:items-center nav-links">
                                <li><a href="/" class="px-3 py-2 rounded  nav-links-item" >Home</a></li>
                               <li> <a href="/about" class="px-3 py-2 rounded nav-links-item">About Us</a></li>
                               <li>
        <div class="relative inline-block text-left">
            <button id="dropdown-button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium nav-links-item">
                Services
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-30">
                <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                    <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer z-32" role="menuitem">
                        Service 1
                      </a>
                    <a class="flex  rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" role="menuitem">
                        Service 2
                      </a>
                    <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" role="menuitem">
                        Service 3
                      </a>
                </div>
            </div>
        </div>
                                </li>
                               <li> <a href="/team" class="px-3 py-2 rounded nav-links-item">Team</a></li>
                               <li> <a href="/messages" class="px-3 py-2 rounded nav-links-item">Messages</a></li>
                               <li> <a href="/contact" class="px-3 py-2 rounded nav-links-item">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
@if(Route::is('home'))
    <div class="hidden md:flex items-center  bg-white">
        <h1 class="bg-blue-500 px-6 py-2 font-bold text-base skewed-border ">News</h1>
        <marquee >
        <a href="/" class="text-black">latest news will appear here</a>
        </marquee>
    </div>                        
@endif 
                    </div>
                    <!-- Mobile Menu Navigation -->
                    <div 
                        x-ref="content" 
                        {{-- x-bind:style="isOpen ? `max-height: ${$refs.content.scrollHeight}px` : 'max-height: 0px'"  --}}
                        x-bind:style="isOpen ? `max-height: min-content` : 'max-height: 0px'" 
                        class="transition-all duration-500 ease-in-out overflow-hidden"
                    >
                    <div class="px-4 pb-2 ">
                                <ul class="md:hidden  nav-links flex flex-col justify-start items-start">
                                <li><a href="#" class="block px-3 py-2 rounded nav-links-item ">Home</a></li>
                                <li> <a href="/about" class="block px-3 py-2 rounded nav-links-item ">About Us</a></li>
                                <li>
                {{-- <div >
                <button 
                    onclick="toggleDropdown()" 
                    class="flex items-center w-full px-3 py-2 rounded nav-links-item">
                    <span class="block">Services </span><i class="fa fa-sort-down mb-1 ml-1"></i>
                </button>
                <ul  id="servicesDropdown-mobile" class=" flex flex-col gap-2  ml-4 nav-dropdown-list h-24 closed">
                    <li><a href="/service1" class="block px-3  rounded nav-links-item">Service 1</a></li>
                    <li><a href="/service2" class="block px-3 rounded nav-links-item">Service 2</a></li>
                    <li><a href="/service3" class="block px-3 rounded nav-links-item">Service 3</a></li>
                </ul>

            </div> --}}

        <div class="relative inline-block text-left">
            <button id="dropdown-button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
                Theme
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <div id="dropdown-menu" class=" absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-30">
                <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                    <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer z-32" role="menuitem">
                        Service 1
                      </a>
                    <a class="flex  rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" role="menuitem">
                        Service 2
                      </a>
                    <a class="flex rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" role="menuitem">
                        Service 3
                      </a>
                </div>
            </div>
        </div>
                                </li>
                                <li> <a href="/team" class="block px-3 py-2 rounded nav-links-item">Team</a></li>
                                <li> <a href="/messages" class="block px-3 py-2 rounded nav-links-item">Messages</a></li>
                                <li> <a href="/contact" class="block px-3 py-2 rounded nav-links-item">Contact Us</a></li>
                                <li> <a href="/notices" class="block px-3 py-2 rounded nav-links-item">Notices</a></li>
                                </ul>
                    </div>
                </div>
    </div>
 </nav>
{{--<script>
    function toggledropdown() {
        if(window.innerwidth > 768){
        const dropdown = document.getelementbyid('servicesdropdown');
        dropdown.classlist.toggle('closed'); // change from `hidden` to `flex` for visibility
        }else{
        const dropdown = document.getelementbyid('servicesdropdown-mobile');
        dropdown.classlist.toggle('closed'); // change from `hidden` to `flex` for visibility
        }
    }
</script> --}}

   <script>
        let isDropdownOpen = false; // Set to true to open the dropdown by default, false to close it by default
        const dropdownButton = document.getElementById('dropdown-button-mobile');
        const dropdownMenu = document.getElementById('dropdown-menu-mobile');
        if(window.innerwidth > 768){
             dropdownButton = document.getElementById('dropdown-button');
             dropdownMenu = document.getElementById('dropdown-menu');
        }

        // Function to toggle the dropdown
        function toggleDropdown() {
            isDropdownOpen = !isDropdownOpen;
            if (isDropdownOpen) {
                dropdownMenu.classList.remove('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        }

        // Initialize the dropdown state
        toggleDropdown();

        // Toggle the dropdown when the button is clicked
        dropdownButton.addEventListener('click', toggleDropdown);

        // Close the dropdown when clicking outside of it
        window.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                isDropdownOpen = false;
            }
        });
    </script>