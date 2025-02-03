
@extends('layouts.admin')
@section('content')
<div class="md:container md:mx-auto px-6 md:px-20  my-8 flex flex-col">
  {{-- Header --}}
  <div class="flex justify-between items-center w-full">
    <h1 class="text-2xl font-semibold text-slate-600">Edit Album</h1>
    <a href="{{ route('admin.gallery.get') }}" class="btn hover:bg-slate-800 hover:text-white">Gallery</a>
  </div>
  {{-- Form --}}
  <form action="{{ route('admin.gallery.post.edit') }}" class="flex max-md:flex-col-reverse gap-10 py-4" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Use PUT method for updates --}}
    <input type="hidden" value="{{$album->id}}" name="id">
    {{-- Album Information --}}
    <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full">
      <h1 class="text-2xl font-semibold text-slate-600">Album Information:</h1>
      {{-- Album Name --}}
      <div class="flex flex-col">
        <label for="album_name">Album Name:</label>
        <input type="text" id="album_name" name="album_name" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Album Name" value="{{ $album->name }}">
        @if($errors->has('album_name'))
          <div class="text-sm text-red-500 mt-1">*{{ $errors->first('album_name') }}</div>
        @endif
      </div>

      {{-- Existing Images --}}
      <div>
        <label>Existing Images:</label>
        <div class="border grid grid-cols-4 gap-1" id="existing-images-container">
          @foreach($album->images as $image)
            <div class="image-preview ">
              <img src="{{ asset('/images/albums/' . $album->name . '/images/' . $image->image_path) }}" alt="Album Image" class="w-full h-auto">
              <button type="button"  onclick="removeExistingImage({{ $image->id }})">x</button>
            </div>
          @endforeach
        </div>
      </div>

      {{-- New Images --}}
      <div>
        <label for="images-upload">Add New Images:</label>
        <input type="file" id="images-upload" multiple accept="image/*" name="images[]">
        <div class="border grid grid-cols-4 gap-1" id="preview-container"></div>
      </div>
      {{-- Submit Button --}}
      <button type="submit" class="btn w-max bg-slate-800 text-white hover:bg-slate-800/90">Update Album</button>
    </div>

    {{-- Thumbnail Image --}}
    <div class="space-y-2 shadow-md p-4 rounded-md h-[400px]">
      <label for="image-upload" class="font-semibold">Select Album Thumbnail:</label>
      <div class="mb-3 text-center h-[300px] max-w-[300px] border mx-auto">
        <img id="image_preview" src="{{ asset('images/albums/' . $album->name . '/' . $album->thumbnail_image) }}" alt="No Image Available" class="w-[300px] h-[300px] object-cover">
      </div>
      <input type="file" id="image-upload" accept="image/*" onchange="previewImage(event)" name="thumbnail_image">
      @if($errors->has('thumbnail_image'))
        <div class="text-sm text-red-500 translate-y-4">*{{ $errors->first('thumbnail_image') }}</div>
      @endif
    </div>
  </form>
</div>
@endsection

@section('scripts')
<script>
  // Preview Thumbnail Image
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image_preview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Handle New Images
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

  // Handle Removal of Existing Images
  function removeExistingImage(imageId) {
    if (confirm('Are you sure you want to remove this image?')) {
      // Add the image ID to a hidden input field for removal
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'removed_images[]';
      input.value = imageId;
      document.querySelector('form').appendChild(input);
      // Remove the image from the DOM
      const imageDiv = document.querySelector(`button[onclick="removeExistingImage(${imageId})"]`).parentElement;
      imageDiv.remove();
    }
  }
</script>
@endsection