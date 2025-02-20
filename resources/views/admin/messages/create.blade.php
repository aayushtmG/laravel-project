@extends('layouts.admin')
@section('content')
<div class="md:container md:mx-auto px-6 md:px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-slate-600">Add Message</h1>
    <a href="{{route('admin.messages.show')}}" class="btn hover:bg-slate-800 hover:text-white">All messages</a>
  </div>
      <div class="p-6 relative">
        <label for="name">Member Name:</label>
        <input 
            type="text" 
            id="search" 
            class="border p-2 w-full" 
            placeholder="Type to search..."
        >
        <div id="results" class="transition-[height] duration-500 rounded-md mt-4 bg-white border border-blue-50 origin-top  absolute  left-6 top-20 " >
        </div>
    </div>
  <form action="{{route('messages.create')}}" class="flex max-md:flex-col-reverse gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full">
    <h1 class="text-2xl font-semibold text-slate-600">
    Message Information:</h1>
      {{-- name --}}
      <div class="flex flex-col">
      <label for="messages_name">Name:</label> 
      <input type="text" id="messages_name" name="name" class="border border-slate-300 rounded-sm p-2" placeholder="Enter message name" value="{{old('name')}}" readonly>
      </div>
      <div class="flex max-md:flex-col  gap-4">
        {{-- email --}}
        <div class="flex flex-col w-full">
        <label for="messages_email">Email:</label> 
        <input type="text" id="messages_email" name="email" class="border border-slate-300 rounded-sm p-2" placeholder="Enter email" value="{{old('email')}}" readonly>
        </div>
        {{-- position --}}
        <div class="flex flex-col w-full">
        <label for="messages_position">Position:</label> 
        <input type="text" id="messages_position" name="position" class="border border-slate-300 rounded-sm p-2" placeholder="Enter position" value="{{old('position')}}" readonly>
        </div>
      </div>
      {{-- message --}}
      <div class="flex flex-col">
        <label for="messages_message">Message Description:</label> 
        <textarea id="messages_message" name="message" class="border border-slate-300 rounded-sm min-h-[200px] p-3"
        placeholder="Enter the messages message here...."
        >{{old('message')}}</textarea> 
      @if($errors->has('message'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('message')}}</div> 
      @endif
      </div>
    <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Submit</button>
    </div> 
    {{-- image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select Message Image:</label>
      <input type="text" value="{{old('image')}}" name="image" id="messages_image" class="hidden">
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/icons/no-image.png') }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
    </div>
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
    <script>
        const searchInput = document.getElementById('search');
        const resultsDiv = document.getElementById('results');
        //form elements 
        const name = document.querySelector('#messages_name')
        const email = document.querySelector('#messages_email')
        const position = document.querySelector('#messages_position')
        const image = document.querySelector('#messages_image')
        const imagePreview = document.getElementById('image_preview')

        function selectMember(value){
            fetch(`/admin/members/search?query=${value}`).then(response => response.json()).then(data => {
              if(data){
                name.value= data[0].name
                email.value= data[0].email 
                position.value = data[0].position
                imagePreview.src = `/images/teams/${data[0].department}/${data[0].image}`
                image.value = `/images/teams/${data[0].department}/${data[0].image}`
                resultsDiv.replaceChildren(); 
                        };
            })

        }


        searchInput.addEventListener('input', function (e) {
          if(this.value == ''){
                resultsDiv.innerHTML = '' 
                name.value= ''
                email.value= ''
                position.value = ''
                imagePreview.src = ''
                image.value = ''
                return;
          }
            const query = this.value;
            // Make an AJAX request to the search route
            fetch(`/admin/members/search?query=${query}`)
                .then((response) => response.json())
                .then((data) => {
                  if(data.length == 0){
                    resultsDiv.innerHTML = ''
                    name.value= ''
                    email.value= ''
                    position.value = ''
                    imagePreview.src = ''
                    image.value = ''
                    return;
                  }else{
                    name.value= data[0].name
                    email.value= data[0].email 
                    position.value = data[0].position
                    imagePreview.src = `/images/teams/${data[0].department}/${data[0].image}`
                    image.value = `/images/teams/${data[0].department}/${data[0].image}`
                  }
                    // Display the results dynamically
                    resultsDiv.innerHTML = data.map((item) => `
                        <span class="cursor-pointer block p-2 px-6 hover:text-white border-b hover:bg-blue-500 z-20"  onclick='selectMember("${item.name}")'>${item.name}</span>
                    `).join('');
                })
                .catch((error) => console.log('none') );
        });
    </script>
  @endsection
