<section class="bg-blue-500/20 py-12">
  <h2 class="organization-header text-2xl lg:text-4xl">{{__("home.organization")}} {{__("home.profile")}}</h2>
  <div class=" container mx-auto grid place-items-center px-4  sm:grid-cols-2 gap-8 max-w-5xl">
    <div class="flex flex-col p-4 bg-gray-50/80 w-full rounded-lg items-center hover:bg-blue-200 transition-colors ease-out py-8"> 
        <img src="/images/icons/teamwork.png" alt="" class="w-12"> 
        <h6>{{__('home.members')}}</h6> 
        <span class=" text-lg">{{$settings->organization_members}}</span>
    </div>

    <div class="flex flex-col p-4 bg-gray-50/80 w-full rounded-lg items-center hover:bg-blue-200 transition-colors ease-out py-8"> 
        <img src="/images/icons/management.png" alt="" class="w-12"> 
        <h6>{{__('home.staffs')}}</h6> 
        <span>{{$settings->organization_staffs}}</span>
    </div>

    <div class="flex flex-col p-4 bg-gray-50/80 w-full rounded-lg items-center hover:bg-blue-200 transition-colors ease-out py-8"> 
        <img src="/images/icons/branch.png" alt="" class="w-12"> 
        <h6>{{__('home.branch')}}</h6> 
        <span>{{$settings->organization_branches}}</span>
    </div>

    <div class="flex flex-col p-4 bg-gray-50/80 w-full rounded-lg items-center hover:bg-blue-200 transition-colors ease-out py-8"> 
        <img src="/images/icons/save-money.png" alt="" class="w-12"> 
        <h6>{{__('home.savings')}}</h6> 
        <span>{{$settings->organization_savings}}</span>
    </div>


    <div class="flex flex-col p-4 bg-gray-50/80 w-full rounded-lg items-center hover:bg-blue-200 transition-colors ease-out py-8"> 
        <img src="/images/icons/personal.png" alt="" class="w-12"> 
        <h6>{{__('home.loan')}}</h6> 
        <span>{{$settings->organization_loans}}</span>
    </div>

    <div class="flex flex-col p-4 bg-gray-50/80 w-full rounded-lg items-center hover:bg-blue-200 transition-colors ease-out py-8"> 
        <img src="/images/icons/pie-chart.png" alt="" class="w-12"> 
        <h6>{{__('home.loan')}}</h6> 
        <span>{{$settings->organization_shares}}</span>
    </div>
  </div>
</section>