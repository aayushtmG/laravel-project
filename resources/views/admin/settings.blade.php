@extends('layouts.admin')
@section('content')
<section>
  @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
  @endif
  <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-4 shadow-md p-4 rounded-md w-full ">
    <h1 class="text-2xl font-semibold text-slate-600">
    All Settings:</h1>
    <div class="grid grid-cols-2 gap-2">
    {{-- logo --}}
    <div class="space-y-2  p-4 rounded-md">
      <label for="logo-image-upload" class="font-semibold">Select Logo:</label>
    <div class="mb-3 text-center  mx-auto space-y-2">
        <img id="logo_image_preview" src="/images/settings/{{$settings->logo}}" alt="No Image Available" class="w-[100px] h-[100px] object-cover" >
        <div class="flex">
          <input type="file" id="logo-image-upload"  accept="image/*" onchange="previewImage(event)" name="logo_image"/>
            @if($errors->has('logo_image'))
            <div class="text-sm text-red-500 translate-y-4">*{{$errors->first('logo_image')}}</div> 
            @endif
        </div>
    </div>
    </div>
    {{-- Banner Image --}}
    <div class="space-y-2  p-4 rounded-md">
      <label for="banner_image" class="font-semibold">Select Banner Image:</label>
    <div class="mb-3 text-center  mx-auto space-y-2">
        <img id="banner_image_preview" src="/images/settings/{{$settings->banner_image}}" alt="No Image Available" class="w-[100px] h-[100px] object-cover" >
        <div class="flex">
          <input type="file" id="banner-image-upload"  accept="image/*" onchange="previewImage(event)" name="banner_image">
            @if($errors->has('banner_image'))
            <div class="text-sm text-red-500 translate-y-4">*{{$errors->first('banner_image')}}</div> 
            @endif
        </div>
    </div>
    </div>
    </div>
      {{-- company name --}}
      <div class="flex flex-col">
      <label for="company_name" class="admin-header">Company Name:</label> 
      <input type="text" id="company_name" name="company_name" class="border border-slate-300 rounded-sm p-2" placeholder="Enter company name" value="{{$settings->company_name}}">
      @if($errors->has('company_name'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('company_name')}}</div> 
      @endif
      </div>

      {{-- number --}}
      <div class="flex flex-col">
      <label for="toll_free_number" class="admin-header">Toll free number:</label> 
      <input type="text" id="toll_free_number" name="toll_free_number" class="border border-slate-300 rounded-sm p-2" placeholder="Enter toll free number" value="{{$settings->toll_free_number}}">
      @if($errors->has('toll_free_number'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('toll_free_number')}}</div> 
      @endif
      </div>
      {{-- email --}}
      <div class="flex flex-col">
      <label for="company_email" class="admin-header">Company Email:</label> 
      <input type="text" id="company_email" name="company_email" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Company Email" value="{{$settings->company_email}}">
      @if($errors->has('company_email'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('company_email')}}</div> 
      @endif
      </div>

      {{-- Address --}}
      <div class="flex flex-col">
      <label for="address" class="admin-header">Address:</label> 
      <input type="text" id="address" name="address" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Address" value="{{$settings->address}}">
      @if($errors->has('address'))
      <div class="text-sm text-red-500 mt-1">*{{$errors->first('address')}}</div> 
      @endif
      </div>
      {{-- Slider Images --}}
<div>
   <h1 class="admin-header">Home Slider Images</h1>
   <div class="file-input ">
      <input type="file" id="slider_images" multiple accept="image/*" class="file px-2 image-upload-btn" />
      <label for="slider_images">
      <i class="fa-solid fa-add mr-2"></i>
        Add Images
        <p class="file-name"></p>
      </label>
   </div>
      <div class="image-preview-container" id="slider-image-container"></div>
</div>

      {{-- organization profile --}}
      <section class="w-full my-4">
      <h1 class="admin-header">Organization Profile</h1>
      <div class="grid grid-cols-3 gap-4">
          {{-- Members --}}
          <div class="flex flex-col">
            <label for="members">Members:</label> 
            <input type="number" id="organization_members" name="organization_members" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Members" value="{{$settings->organization_members}}">
          </div>
          {{-- Staff --}}
          <div class="flex flex-col">
            <label for="organization_staffs">Staffs:</label> 
            <input type="number" id="organization_staffs" name="organization_staffs" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Staff Numbers" value="{{$settings->organization_staffs}}">
        </div>
          {{-- Branch --}}
          <div class="flex flex-col">
            <label for="organization_branch">Branches:</label> 
            <input type="number" id="organization_branch" name="organization_branches" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Branches number" value="{{$settings->organization_branches}}">
          </div>
          {{-- Savings --}}
          <div class="flex flex-col">
            <label for="organization_savings">Savings:</label> 
            <input type="number" id="organization_savings" name="organization_savings" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Organization Saving" value="{{$settings->organization_savings}}">
        </div>
          {{-- Loan --}}
          <div class="flex flex-col">
            <label for="organization_loans">Loan:</label> 
            <input type="number" id="organization_loans" name="organization_loans" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Loans Number" value="{{$settings->organization_loans}}">
          </div>
          {{-- Share --}}
          <div class="flex flex-col">
            <label for="organization_shares">Shares:</label> 
            <input type="number" id="organization_shares" name="organization_shares" class="border border-slate-300 rounded-sm p-2" placeholder="Enter Shares Number" value="{{$settings->organization_shares}}">
        </div>
      </div>
    </section>
    <button type="submit" class="btn w-max min-w-[150px] bg-slate-800 text-white hover:bg-slate-800/90">Update</button>
  </form>
</section>
@endSection
@section('scripts')
   <script>
      const imageUploadInput = document.getElementById('logo_image');
      const previewContainer = document.getElementById('logo_image_preview');
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
         min-height: 200px;
         margin-top: 10px;
      }

      .image-preview {
         position: relative;
         width: 300px;
         height: 200px;
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
         background: transparent;
         color: black;
         border: 1px solid black;
         border-radius: 50%;
         width: 20px;
         height: 20px;
         font-size: 12px;
         cursor: pointer;
      }
      .image-preview button:hover {
         background: black;
         color:white;
      }
   </style>
   @endsection