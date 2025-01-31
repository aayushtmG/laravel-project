    {{-- footer --}}
    <footer class="footer">
      <div class="footer-upper grid sm:grid-cols-2  sm:place-items-center sm:items-start
        lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 3xl:grid-cols-6 p-4 md:p-16 ">
        <div class="footer-list-container">
          <h3 class="footer-header">{{__('footer.address')}}</h3>
          <ul class="footer-list flex flex-col gap-1">
            <li><i class="fa fa-location-arrow" aria-hidden="true"></i>{{$settings->address}}</li>
            <li><i class="fa fa-phone" aria-hidden="true"></i>{{$settings->toll_free_number}}</li>
            <li><i class="fa fa-envelope" aria-hidden="true"></i>{{$settings->company_email}}</li>
          </ul>
        </div> 
        {{--  --}}
        <div class="footer-list-container">
          <h3 class="footer-header">{{__('footer.office hour')}}</h3>
          <ul class="footer-list flex flex-col gap-1">
            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{__('footer.monday')}} to {{__('footer.sunday')}}</li>
            <li><i class="fa fa-clock" aria-hidden="true"></i>{{__('footer.openinghour')}}  {{__('footer.am')}} {{__('footer.to')}} {{__('footer.closinghour')}} {{__('footer.pm')}}</li>
            {{-- social links --}}
            <ul class="flex ">
              <li><a href="/" ><i class="fa-brands fa-square-facebook text-3xl hover:text-blue-400 transition-colors " ></i></a></li>
              <li><a href="/"><i class="fa-brands fa-square-instagram text-3xl hover:text-blue-400 transition-colors "></i></a></li>
              <li><a href="/" ><i class="fa-brands fa-square-youtube text-3xl  hover:text-blue-400 transition-colors "></i></a></li>
            </ul>
          </ul>
        </div> 
        <div class="footer-list-container">
          <h3 class="footer-header">Useful Links</h3>
          <ul class="footer-list flex flex-col gap-1">
            <li><a href="/">{{__('footer.home')}}</a></li>
            <li><a href="/">{{__('footer.aboutus')}}</a></li>
            <li> <a href="/">{{__('footer.our')}} {{__('footer.services')}}</a></li>
            <li><a href="/">{{__('footer.contactus')}}</a></li>
            <li><a href="/">{{__('footer.latest')}} {{__('footer.news')}}</a></li>
          </ul>
        </div> 
        {{--  --}}
        <div class="footer-list-container">
          <h3 class="footer-header">{{__('footer.services')}}</h3>
          <ul class="footer-list flex flex-col gap-1">
            @foreach ($services as $service)
            <li><a href="/">{{$service->title}}</a></li>
            @endforeach
          </ul>
        </div> 
{{--  --}}
        <div class="footer-list-container">
          <h3 class="footer-header">{{__('footer.others')}}</h3>
          <ul class="footer-list flex flex-col gap-1">
            <li><a href="/">{{__('footer.notices')}}</a></li>
            <li><a href="/">{{__('footer.reports')}}</a></li>
            <li><a href="/">{{__('footer.downloads')}}</a></li>
            <li><a href="/">{{__('footer.gallery')}}</a></li>
          </ul>
        </div> 
        {{--  --}}
        <div class="footer-list-container">
          <h3 class="footer-header">{{__('footer.explore')}}</h3>
          <ul class="footer-list flex flex-col gap-1">
            <li><a href="/">{{__('footer.branches')}}</a></li>
            <li><a href="/">ATM Locations</a></li>
          </ul>
        </div>
      </div>
      <div class="text-center footer-lower bg-[#0f781c] p-4">
        <h4 >Copyright &copy 2025,All Rights Reserved</h4>
        <h4>{{$settings->company_name}}</h4>
      </div>
    </footer>