
@extends('layouts.app')
@section('title',$title)
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col">
        <!-- album detail -->
        <div class="flex flex-col items-center">
            <h1 class="text-2xl 2xl:text-3xl font-bold mb-4">{{ $album->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $album->description }}</p>
        </div>

        <div class="flex gap-8 max-sm:flex-col items-center sm:justify-center flex-wrap">
            @foreach ($images as $image)
                <img src="{{ asset('/images/albums/' . $album->name.'/images/'.$image->image_path) }}" alt="{{ $album->name }}" class="w-[300px] h-[300px] object-center object-contain lg:object-cover rounded-lg shadow-lg cursor-pointer" onclick="openModal('{{ asset('/images/albums/' . $album->name.'/images/'.$image->image_path) }}')">
            @endforeach
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal hidden fixed z-20 inset-0 bg-black bg-opacity-70  items-center justify-center p-4" onclick="closeModal()">
            {{-- <span class="close text-white text-4xl absolute top-4 right-8 cursor-pointer" onclick="closeModal()">&times;</span> --}}
            <img id="modalImage" class="rounded-lg max-w-[450px]" src="" alt="">
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function openModal(imageSrc) {
        const modal = document.getElementById('myModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageSrc;
        modal.classList.add('open');
    }

    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.classList.remove('open');
    }
    </script>
@endsection
@section('style')
<style>
.modal {
    display: none; /* Hidden by default */
}
.modal.open {
    display: flex; /* Show when modal is open */
}
</style>
@endsection
