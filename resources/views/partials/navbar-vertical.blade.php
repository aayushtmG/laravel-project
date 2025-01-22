<!-- start navbar -->
<nav class="navbar-vertical navbar ">
   <div id="myScrollableElement" class="h-screen " >
      <!-- brand logo -->
      <a class="navbar-brand text-white text-xl font-semibold" href="{{route('admin.index')}}">
         Babylon
      </a>
      <!-- navbar nav -->
      <ul class="navbar-nav flex-col" id="sideNavbar ">
         <li class="nav-item">
            <a class="nav-link {{request()->is('admin')? 'active': ''}}" href="{{route('admin.index')}}">
               <i  class="fa-solid fa-home w-4 h-4 mr-2"></i>
               Dashboard
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
                  Services
               </a>
               <div id="navPages" class="collapse">
                  <ul class="nav flex-col">
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/services') ? 'active' : '' }}" href="{{ url('admin/services') }}">All Services</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/services/create') ? 'active' : '' }}" href="{{ url('admin/services/create') }}">Add Services</a>
                        </li>
                  </ul>
               </div>
         </li>

         <li class="nav-item ">
               <a class="nav-link"  onclick="toggleDropdown(event)" >
                  <i  class="fa-solid fa-pen w-4 h-4 mr-2"></i>
                  Members
               </a>
               <div id="navPages" class="collapse">
                  <ul class="nav flex-col">
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/members') ? 'active' : '' }}" href="{{ url('admin/members') }}">All Members</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/members/create') ? 'active' : '' }}" href="{{ url('admin/members/create') }}">Add Members</a>
                        </li>
                  </ul>
               </div>
         </li>

         <li class="nav-item ">
               <a class="nav-link"  onclick="toggleDropdown(event)" >
                  <i  class="fa-solid fa-pen w-4 h-4 mr-2"></i>
                  News
               </a>
               <div id="navPages" class="collapse">
                  <ul class="nav flex-col">
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/news') ? 'active' : '' }}" href="{{ url('admin/news') }}">All News</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/news/create') ? 'active' : '' }}" href="{{ url('admin/news/create') }}">Add News</a>
                        </li>
                  </ul>
               </div>
         </li>


         <li class="nav-item ">
               <a class="nav-link"  onclick="toggleDropdown(event)" >
                  <i  class="fa-solid fa-pen w-4 h-4 mr-2"></i>
                  Events
               </a>
               <div id="navPages" class="collapse">
                  <ul class="nav flex-col">
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/pages/events') ? 'active' : '' }}" href="{{ url('admin/pages/events') }}">All Events</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link {{ request()->is('admin/pages/add-events') ? 'active' : '' }}" href="{{ url('admin/pages/add-events') }}">Add Events</a>
                        </li>
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
