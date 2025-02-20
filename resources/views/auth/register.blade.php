@extends('layouts.auth')
@section('content')
      <!-- start signup page -->
      <div class="flex flex-col items-center justify-center  h-screen px-4 max-w-lg mx-auto" >
         <div class="justify-center items-center w-full bg-white rounded-md shadow lg:flex md:mt-0 max-w-md xl:p-0">
            <div class="p-6 w-full sm:p-8 lg:p-8">
               <div class="mb-4">
                  <p class="mb-6 text-center text-2xl ">Sign Up</p>
               </div>
               <!-- form -->
               <form action="{{route('register')}}" method="POST">
                @csrf
                  <!-- username -->
                  <div class="lg:flex 2xl:block gap-4">
                     <div class="mb-3">
                        <label for="username" class="inline-block mb-2">Full Name</label>
                        <input
                           type="text"
                           id="fullName"
                           class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                           name="name"
                           placeholder="Enter Full Name"
                           required="" />
                     </div>
                     <!-- email -->
                     <div class="mb-3">
                        <label for="email" class="inline-block mb-2">Email</label>
                        <input
                           type="email"
                           id="email"
                           class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                           name="email"
                           placeholder="Email address here"
                           required="" />
                  </div>
                  <!-- password -->
                  <div class="mb-3">
                     <label for="password" class="inline-block mb-2">Password</label>
                     <input
                        type="password"
                        id="password"
                        class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                        name="password"
                        placeholder="**************"
                        required="" />
                  </div>
                  <!-- password -->
                  <div class="mb-5">
                     <label for="confirm-password" class="inline-block mb-2">Confirm Password</label>
                     <input
                        type="password"
                        id="confirm-password"
                        class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                        name="password_confirmation"
                        placeholder="**************"
                        required="" />
                  </div>
                     <!-- button -->
                        <button
                           type="submit"
                           class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                           Create Account
                        </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
@endsection