@extends('layouts.admin')
@section('content')
<div class="p-6">
  {{-- header --}}
  <div class="flex justify-between items-center my-4">
    <h1 class="text-2xl font-semibold text-slate-600">
    News 
</h1>
    <a href="{{route('admin.news.get.create')}}" class="btn hover:bg-slate-800 hover:text-white">Add News</a>
  </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase  border border-black "
                    >
                      <th class="px-4 py-3">Title</th>
                      <th class="px-4 py-3">Image</th>
                      <th class="px-4 py-3">Description</th>
                      <th class="px-4 py-3">Date</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 "
                  >
                  @foreach ($news as $item)
                    <tr class="text-gray-700">
                      <td class="px-4 py-3 font-semibold">
                        {{$item->title}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <img src="/images/news/{{$item->image}}"
                        class="max-w-[150px]"/>
                      </td>
                      <td class="px-4 py-3 text-xs ">
                        <p class="text-sm">
                        {{substr($item->description,0,25).'...'}}
                        </p>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$item->updated_at->format('Y-m-d')}}  
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <a href="{{route('admin.news.get.edit',['id'=> $item['id']])}}">
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray hover:text-slate-800"
                            aria-label="Edit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </button>

                          </a>
                          <form action="{{route('news.delete')}}" method="POST" class="m-0">
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
                        </div>
                      </td>
                    </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
              <div
                class="flex justify-between px-4 py-3 w-full"
              >
                  {{ $news->links()}}
              </div>
            </div>

</div>
@endsection
<style>
  nav{
    width:100%;
  }
  </style>