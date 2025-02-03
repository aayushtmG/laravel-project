@extends('layouts.admin')
@section('content')
               <div class="overflow-hidden rounded-lg shadow-xs my-8 flex max-lg:flex-col-reverse max-lg:items-center gap-4">
              <div class="w-full overflow-x-auto px-2">
                <table class="w-full whitespace-no-wrap">
                  <thead class="flex-grow-0 ">
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase  border border-black h-full"
                    >
                      <th class="px-4 py-3 ">Image</th>
                      <th class="px-4 py-3">Date</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 "
                  >
                  @foreach ($images as $item)
                    <tr class="text-gray-700">
                      <td class="px-4 py-3 text-sm">
                        <img src="/images/sliders/{{$item->image}}"
                        class="max-w-[500px]"/>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$item->updated_at->format('Y-m-d')}}  
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <form action="{{route('sliders.delete')}}" method="POST">
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
            <form action="{{route('sliders.create')}}" class="shadow-lg flex gap-10 py-4 mx-10  min-w-[400px]" method="POST" enctype="multipart/form-data">
              @csrf
                  {{-- Add new image --}}
                      <div class="space-y-2 p-4  rounded-md h-min file-input mx-auto">
                      <div class="mb-3 text-center h-[300px] w-[350px] max-lg:w-[300px] border mx-auto ">
                          <img id="image_preview" src="{{ asset('images/icons/no-image.png') }}" alt="No Image Available" class="max-w-[350px] w-full h-[300px] object-cover" >
                      </div>
                    <input type="file" id="slider_images" name="image"  accept="image/*" class="file px-2 image-upload-btn" onchange="previewImage(event)"/>
                    <div class="flex justify-between">
                        <div>
                          <label for="slider_images">
                          <i class="fa-solid fa-add mr-2"></i>
                            Add Image
                            <p class="file-name"></p>
                          </label>
                        </div>
                      <button type="submit" class="btn">Upload</button>
                      </form>
                </div>
@endsection
@section('scripts')
   <script>
   function previewImage(event){
    const input = event.target
    const preview = document.getElementById('image_preview')
    if(input.files && input.files[0]){
      const reader = new FileReader();
      reader.onload= function(e){
        preview.src = e.target.result;
      }
      reader.readAsDataURL(input.files[0])
    }
    }
   </script>
  @endsection