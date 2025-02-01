
@extends('layouts.auth')
@section('content')
      <!-- start signup page -->
      <div class="flex items-center justify-center g-0 h-screen px-4 max-w-lg mx-auto" >
         <div class="flex flex-col justify-center items-center w-full bg-white rounded-md shadow lg:flex md:mt-0 max-w-md xl:p-0">
            <div class="p-6 w-full sm:p-8 lg:p-8">
               <div class="mb-4">
                  <p class="mb-6 text-center text-2xl ">Sign In</p>
               </div>
               <!-- form -->
               <form action="{{route('login')}}" method="POST" class="flex flex-col space-y-4">
                @csrf
                     <!-- email -->
                     <div class="w-full">
                        <label for="email" class="mb-2">Email</label>
                        <input
                           type="email"
                           id="email"
                           class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                           name="email"
                           placeholder="Email address here"
                            />
                     </div>
                  <!-- password -->
                  <div class="w-full">
                     <label for="password" class="mb-2">Password</label>
                     <input
                        type="password"
                        id="password"
                        class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full py-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                        name="password"
                        placeholder="**************"
                        />
                  </div>
                     {{-- login --}}
                        <button class="mb-2 bg-blue-500 border border-blue-500 hover:bg-white hover:text-black transition-colors rounded-md text-white py-2 px-8 mx-auto  w-max">
                           Sign In
                        </button>
 <!-- validation errors -->
    @if ($errors->any())
      <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors->all() as $error)
          <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
      </ul>
    @endif
               </form>
            </div>
         </div>
      </div>
@endsection