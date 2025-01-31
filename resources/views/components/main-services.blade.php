<section class="grid place-items-center container mx-auto my-20 md:grid-cols-2 xl:grid-cols-4 gap-10">
  {{-- start //can be made component --}}
  <div class='flex flex-col gap-2 items-center shadow-lg w-full p-4 py-6 rounded-lg '>
    <div class="bg-gradient-to-r from-blue-600 to-green-600 w-max p-4 rounded-2xl">
      <img src="/images/icons/365bank.png" alt="bank service image" class="w-14">
    </div>
    <h2 class="text-lg">{{__('home.3')}}{{__('home.6')}}{{__('home.5')}}  {{__('home.banking')}} {{__('home.service')}}</h2>
  </div>
  {{-- end --}}

  {{-- start //can be made component --}}
  <div class='flex flex-col gap-2 items-center shadow-lg w-full p-4 py-6 rounded-lg '>
    <div class="bg-gradient-to-r from-blue-600 to-green-600 w-max p-4 rounded-2xl">
      <img src="/images/icons/credit-cards-payment.png" alt="bank service image" class="w-14">
    </div>
    <h2 class="text-lg">{{__('home.sms')}} {{__('home.service')}}</h2>
  </div>
  {{-- end --}}

  {{-- start //can be made component --}}
  <div class='flex flex-col gap-2 items-center shadow-lg w-full p-4 py-6 rounded-lg '>
    <div class="bg-gradient-to-r from-blue-600 to-green-600 w-max p-4 rounded-2xl">
      <img src="/images/icons/mobile-payment.png" alt="bank service image" class="w-14">
    </div>
    <h2 class="text-lg">{{__('home.free')}} {{__('home.mobile')}} {{__('home.banking')}}</h2>
  </div>
  {{-- end --}}

  {{-- start //can be made component --}}
  <div class='flex flex-col gap-2 items-center shadow-lg w-full p-4 py-6 rounded-lg '>
    <div class="bg-gradient-to-r from-blue-600 to-green-600 w-max p-4 rounded-2xl">
      <img src="/images/icons/mobile.png" alt="bank service image" class="w-14">
    </div>
    <h2 class="text-lg">{{__('home.debit')}} {{__('home.card')}}</h2>
  </div>
  {{-- end --}}
</section>