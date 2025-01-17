<!-- start navbar -->
<div class="header">
   <!-- navbar -->
   <nav class="bg-white px-6 py-[10px] flex items-center justify-between shadow-sm">
      <a id="nav-toggle" href="#" class="text-gray-800">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
         </svg>
      </a>
      <!-- navbar nav -->
      <ul class="flex ml-auto items-center">
         <!-- list -->
         <li class="dropdown ml-2">
            <a class="rounded-full" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <div class="w-10 h-10 relative">
                  <img alt="avatar" src="/images/members/profile-1.jpg" class="rounded-full" />
                  <div class="absolute border-gray-200 border-2 rounded-full right-0 bottom-0 bg-green-600 h-3 w-3"></div>
               </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end  p-2">
               <div class="px-4 pb-0 pt-2">
                  <div class="leading-4">
                     <h5 class="mb-1"> Babylon</h5>
                     <a href="#">View my profile</a>
                  </div>
                  <div class="border-b mt-3 mb-2"></div>
               </div>

               <ul class="list-unstyled">
                  <li>
                     <a class="dropdown-item" href="#">
                        <i class="w-4 h-4" data-feather="user"></i>
                        Edit Profile
                     </a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="#">
                        <i class="w-4 h-4" data-feather="activity"></i>
                        Activity Log
                     </a>
                  </li>

                  <li>
                     <a class="dropdown-item" href="#">
                        <i class="w-4 h-4" data-feather="star"></i>
                        Go Pro
                     </a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="#">
                        <i class="w-4 h-4" data-feather="settings"></i>
                        Account Settings
                     </a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="./index.html">
                        <i class="w-4 h-4" data-feather="power"></i>
                        Sign Out
                     </a>
                  </li>
               </ul>
            </div>
         </li>
      </ul>
   </nav>
</div>
<!-- end of navbar -->
<script>
document.addEventListener('DOMContentLoaded', function () {
   const dropdownToggle = document.getElementById('dropdownUser');
   const dropdownMenu = document.querySelector('.dropdown-menu');

   // Function to toggle dropdown visibility
   dropdownToggle.addEventListener('click', function (event) {
      event.preventDefault(); // Prevent default anchor behavior
      dropdownMenu.classList.toggle('show');
   });

   // Close dropdown if clicked outside
   document.addEventListener('click', function (event) {
      const isClickInside = dropdownMenu.contains(event.target) || dropdownToggle.contains(event.target);
      if (!isClickInside && dropdownMenu.classList.contains('show')) {
         dropdownMenu.classList.toggle('show');
      }
   });
   let navToggle = document.getElementById('nav-toggle');    
   if(navToggle){
      navToggle.addEventListener('click',function(e){
         e.preventDefault();
         const appLayout = document.getElementById('app-layout');
         if(appLayout){
            appLayout.classList.toggle('toggled');
         }
      })
   }

});
</script>
