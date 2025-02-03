@extends('layouts.admin')
@section('content')
<div class="md:container md:mx-auto px-6 md:px-20  my-8 flex flex-col">
  {{-- header --}}
  <div class="flex justify-between items-center w-full">
    <h1 class="text-2xl font-semibold text-slate-600">
    Add New Album 
    </h1>
    <a href="{{route('admin.gallery.get')}}" class="btn hover:bg-slate-800 hover:text-white">Gallery</a>
  </div>
  <form action="{{route('admin.gallery.create')}}" class="flex max-md:flex-col-reverse gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full  ">
    <h1 class="text-2xl font-semibold text-slate-600">
     Album Information:</h1>
      {{-- title --}}
      <div class="flex flex-col">
        <label for="album_name">Album Name:</label> 
        <input type="text" id="album_name" name="album_name" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Album Name" value="{{old('title')}}">
        @if($errors->has('name'))
        <div class="text-sm text-red-500 mt-1">*{{$errors->first('name')}}</div> 
        @endif
      </div>
      <div>
        <label for="image-upload">Select Images:</label>
        <input type="file" id="images-upload" multiple accept="image/*" name="images[]">
        <div class=" border grid grid-cols-4 gap-1" id="preview-container" ></div>
      </div>
      <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Submit</button>
    </div> 
    {{-- image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select Album Thumbnail:</label>
    <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/icons/no-image.png') }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover" >
    </div>
      <input type="file" id="image-upload"  accept="image/*" onchange="previewImage(event)" name="thumbnail_image">
      @if($errors->has('image'))
      <div class="text-sm text-red-500 translate-y-4">*{{$errors->first('image')}}</div> 
      @endif
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

const imageUploadInput = document.getElementById('images-upload');
const previewContainer = document.getElementById('preview-container');

let filesArray = []; // Maintain an array of files

imageUploadInput.addEventListener('change', (event) => {
   const newFiles = Array.from(event.target.files);
   filesArray = [...filesArray, ...newFiles]; // Add new files to the array
   updatePreviews();
});

function updatePreviews() {
   previewContainer.innerHTML = ''; // Clear existing previews
   const dataTransfer = new DataTransfer();

   filesArray.forEach((file, index) => {
      // Add files to DataTransfer
      dataTransfer.items.add(file);

      const previewDiv = document.createElement('div');
      previewDiv.classList.add('image-preview');

      const img = document.createElement('img');
      const reader = new FileReader();
      reader.onload = (e) => {
         img.src = e.target.result;
      };
      reader.readAsDataURL(file);

      const removeButton = document.createElement('button');
      removeButton.textContent = 'x';
      removeButton.onclick = () => {
         filesArray.splice(index, 1); // Remove file from array
         updatePreviews(); // Update previews
      };

      previewDiv.appendChild(img);
      previewDiv.appendChild(removeButton);
      previewContainer.appendChild(previewDiv);
   });
   imageUploadInput.files = dataTransfer.files; // Update the input's files
}
   </script>
  @endsection
