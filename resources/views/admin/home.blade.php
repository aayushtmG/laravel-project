@extends('layouts.admin')
@section('content')
                        <div class="p-6 max-w-2xl mx-auto">
                        <div class="my-10">
                           <h4 class="font-bold text-2xl text-center">User Information</h4>
                        </div>
                           <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                              <div class="flex-1 text-gray-800 font-semibold">
                                 <h5 class="mb-0">Profile Picture</h5>
                              </div>
                              <div class="flex-[3]">
                                 <div class="flex items-center">
                                    <!-- image -->
                                    <div class="me-8">
                                       <img src="/images/members/profile-1.jpg" class="rounded-full w-16 h-16" alt="" />
                                    </div>
                                    <div>
                                       <!-- button -->
                                       <button
                                          type="button"
                                          class="btn gap-x-2 bg-white text-gray-800 border-gray-300 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                          Change
                                       </button>
                                       <!-- button -->
                                       <button
                                          type="button"
                                          class="btn gap-x-2 bg-white text-gray-800 border-gray-300 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                          Remove
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <form>
                                 <!-- input -->

                                 <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                                    <label for="fullName" class="flex-1 text-gray-800 font-semibold">Full name</label>
                                    <div class="flex-[3] w-full grid grid-cols-1 md:grid-cols-2 gap-6">
                                       <input
                                          type="text"
                                          class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                          placeholder="First name"
                                          id="fullName"
                                          required="" />

                                       <input
                                          type="text"
                                          class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                          placeholder="Last name"
                                          id="lastName"
                                          required="" />
                                    </div>
                                 </div>

                                 <!-- input -->
                                 <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                                    <label for="email" class="flex-1 text-gray-800 font-semibold">Email</label>
                                    <div class="flex-[3] w-full">
                                       <input
                                          type="email"
                                          class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                          placeholder="Email"
                                          id="email"
                                          required="" />
                                    </div>
                                 </div>
                                 <!-- input -->
                                 <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                                    <label for="phone" class="flex-1 text-gray-800 font-semibold">
                                       Phone
                                       <span>(Optional)</span>
                                    </label>
                                    <div class="flex-[3] w-full">
                                       <input
                                          type="text"
                                          class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                          placeholder="Phone"
                                          id="phone"
                                          required="" />
                                    </div>
                                 </div>
                                 <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                                    <div class="flex-1 text-gray-800 font-semibold"></div>
                                    <div class="flex-[3]">
                                       <button
                                          type="submit"
                                          class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                          Save Changes
                                       </button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        </div>
                        @endSection