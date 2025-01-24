@extends('layouts.admin')
@section('content')
   <h1>Upload Multiple Images</h1>
   <form id="image-upload-form">
      <label for="image-upload">Select Images:</label>
      <input type="file" id="image-upload" multiple accept="image/*">
      <div class="image-preview-container" id="preview-container"></div>
   </form>
@endsection
@section('scripts')
   <script>
      const imageUploadInput = document.getElementById('image-upload');
      const previewContainer = document.getElementById('preview-container');
      imageUploadInput.addEventListener('change', (event) => {
         const files = Array.from(event.target.files);

         files.forEach((file, index) => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = (e) => {
               const previewDiv = document.createElement('div');
               previewDiv.classList.add('image-preview');

               const img = document.createElement('img');
               img.src = e.target.result;

               const removeButton = document.createElement('button');
               removeButton.textContent = 'x';
               removeButton.onclick = () => {
                  previewDiv.remove();
                  const fileList = Array.from(imageUploadInput.files);
                  fileList.splice(index, 1);
                  const dataTransfer = new DataTransfer();
                  fileList.forEach(file => dataTransfer.items.add(file));
                  imageUploadInput.files = dataTransfer.files;
               };

               previewDiv.appendChild(img);
               previewDiv.appendChild(removeButton);
               previewContainer.appendChild(previewDiv);
            };
            reader.readAsDataURL(file);
         });
      });
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