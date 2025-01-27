@extends('layouts.admin')
@section('content')
   <h1>Upload Multiple Images</h1>
   <div class="flex gap-4 ">
    @foreach ($images as $item)
      <form action="{{route('delete.image')}}" method="POST" class="border border-red-500">
        @csrf
        <input type="hidden" value="{{$item->id}}" name="id">
        <img src="{{asset('/images/sliders/'.$item->image)}}" class="w-50 h-52"/> 
        <button type="submit">Delete {{$item->id}}</button> 
      </form>
    @endforeach
   </div>
   <form id="image-upload-form" action="{{route('test')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <label for="image-upload">Select Images:</label>
      <input type="file" id="image-upload" multiple accept="image/*" name="images[]">
      <div class="image-preview-container" id="preview-container"></div>
      <button type="submit" class="btn">submit</button>
   </form>
@endsection
@section('scripts')
   <script>
const imageUploadInput = document.getElementById('image-upload');
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
@section('styles')
   <style>
      .image-preview-container {
         display: flex;
         flex-wrap: wrap;
         gap: 10px;
         margin-top: 10px;
      }

      .image-preview {
         position: relative;
         width: 100px;
         height: 100px;
         border: 2px solid #ddd;
         border-radius: 5px;
         overflow: hidden;
         display: flex;
         justify-content: center;
         align-items: center;
         background-color: #f7f7f7;
      }

      .image-preview img {
         width: 100%;
         height: 100%;
         object-fit: cover;
      }

      .image-preview button {
         position: absolute;
         top: 5px;
         right: 5px;
         background: red;
         color: white;
         border: none;
         border-radius: 50%;
         width: 20px;
         height: 20px;
         font-size: 12px;
         cursor: pointer;
      }

      .image-preview button:hover {
         background: darkred;
      }
   </style>
   @endsection