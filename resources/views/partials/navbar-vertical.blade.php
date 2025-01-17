<!-- start navbar -->
<nav class="navbar-vertical navbar ">
   <div id="myScrollableElement" class="h-screen " >
      <!-- brand logo -->
      <a class="navbar-brand" href="{{route('admin.index')}}">
         Babylon
      </a>
      <!-- navbar nav -->
      <ul class="navbar-nav flex-col" id="sideNavbar ">
         <li class="nav-item">
            <a class="nav-link {{request()->is('admin')? 'active': ''}}" href="{{route('admin.index')}}">
               <i  class="fa-solid fa-home w-4 h-4 mr-2"></i>
               Profile
            </a>
         </li>
         <!-- nav item -->
         <li class="nav-item">
            <div class="navbar-heading">Layouts & Pages</div>
         </li>
         <!-- nav item -->
         <li class="nav-item ">
         <a class="nav-link"  onclick="toggleDropdown(event)" >
            <i  class="fa-solid fa-pen w-4 h-4 mr-2"></i>
            Pages
         </a>
         <div id="navPages" class="collapse">
            <ul class="nav flex-col">
                  <li class="nav-item">
                     <a class="nav-link {{ request()->is('admin/pages/home') ? 'active' : '' }}" href="{{ url('admin/pages/home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->is('settings') ? 'active' : '' }}" href="{{ url('admin/pages/services') }}">Services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->is('billing') ? 'active' : '' }}" href="{{ url('admin/pages/about') }}">About Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->is('pricing') ? 'active' : '' }}" href="{{ url('admin/pages/members') }}">Pricing</a>
                  </li>
                  {{-- <li class="nav-item">
                     <a class="nav-link {{ request()->is('404-error') ? 'active' : '' }}" href="{{ url('404-error') }}">404 Error</a>
                  </li> --}}
            </ul>
         </div>
         </li>

      </ul>
   </div>
</nav>
<script>
function toggleDropdown(event) {
    const dropdown = event.target.nextElementSibling;
    if(dropdown){
      dropdown.classList.toggle('show')
    }
}

</script>
<!--end of navbar-->
