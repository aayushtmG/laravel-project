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
            <li><i class="fa fa-calendar" aria-hidden="true"></i>Monday to Sunday</li>
            <li><i class="fa fa-clock" aria-hidden="true"></i>08:00 AM to 5:00 PM</li>
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
            <li><a href="/">Home</a></li>
            <li><a href="/">About Us</a></li>
            <li> <a href="/">Our Services</a></li>
            <li><a href="/">Contact Us</a></li>
            <li><a href="/">Latest News</a></li>
          </ul>
        </div> 
        {{--  --}}
        <div class="footer-list-container">
          <h3 class="footer-header">Services</h3>
          <ul class="footer-list flex flex-col gap-1">
            @foreach ($services as $service)
            <li><a href="/">{{$service->title}}</a></li>
            @endforeach
          </ul>
        </div> 
{{--  --}}
        <div class="footer-list-container">
          <h3 class="footer-header">Others</h3>
          <ul class="footer-list flex flex-col gap-1">
            <li><a href="/">Notices</a></li>
            <li><a href="/">Reports</a></li>
            <li><a href="/">Downloads</a></li>
            <li><a href="/">Gallery</a></li>
          </ul>
        </div> 
        {{--  --}}
        <div class="footer-list-container">
          <h3 class="footer-header">Explore</h3>
          <ul class="footer-list flex flex-col gap-1">
            <li><a href="/">Branches</a></li>
            <li><a href="/">ATM Locations</a></li>
          </ul>
        </div>
      </div>
      <div class="text-center footer-lower bg-[#0f781c] p-4">
        <h4 >Copyright &copy 2025,All Rights Reserved</h4>
        <h4>{{$settings->company_name}}</h4>
      </div>
    </footer>