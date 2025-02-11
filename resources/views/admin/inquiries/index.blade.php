@extends('layouts.admin')
@section('content')
<div class="p-6">
  {{-- header --}}
  <div class="flex justify-between items-center my-4">
    <h1 class="text-2xl font-semibold text-slate-600">
    All Email Inquiries 
</h1>
  </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase  border border-black "
                    >
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Message</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 "
                  >
                  @foreach ($inquiries as $item)
                    <tr class="text-gray-700 relative">
                      <td class="px-4 py-3">
                        {{$item->name}}
                      </td>
                      <td class="px-4 py-3 text-xs ">
                        <p class="">
                          {{$item->email}}
                        </p>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{substr($item->message,0,25).'...'}}
                      </td>
                      <td class="px-4 py-3 col-span-2">
                        <div class="flex items-center space-x-4 text-sm">
                          <form action="{{route('inquiry.delete')}}" method="POST" class="m-0">
                            @csrf
                          <input type="hidden" value="{{$item->id}}" name="id">
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray hover:text-slate-800"
                            aria-label="Delete"
                            type="submit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                              ></path>
                            </svg>
                          </button>
                          </form>
                          <a href="{{route('admin.inquiry.show',['id'=>$item->id])}}" class="absolute right-4">
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 rounded-lg btn focus:outline-none focus:shadow-outline-gray hover:text-white  hover:bg-slate-800"
                            aria-label="Edit"
                          >
                          View
                          </button>
                        </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
              </div>
                  @if (count($inquiries) == 0)
                      <div class="text-center">
                        <h1 class="my-20 font-semibold text-gray-600 text-base">No inquiries added</h1>
                        </div> 
                  @endif
              <div
                class="flex justify-between px-4 py-3 w-full"
              >
                  {{ $inquiries->links()}}
              </div>
            </div>
            </div>

</div>
@endsection
<style>
  nav{
    width: 100%;
  }
  </style>