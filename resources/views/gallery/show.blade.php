{{-- 
@extends('layouts.app')
@section('title',$title)
@section('content')
<div class="container mx-auto px-4 py-6 relative">
    <div class="flex flex-col "  >
        <!-- album detail -->
        <div class="flex flex-col items-center">
            <h1 class="text-2xl 2xl:text-3xl font-bold mb-4">{{ $album->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $album->description }}</p>
        </div>
        <div class="flex gap-8 max-sm:flex-col items-center sm:justify-center flex-wrap">
            @foreach ($images as $index => $image)
                <img src="{{ asset('/images/albums/' . $album->name.'/images/'.$image->image_path) }}" alt="{{ $album->name }}" class="w-[300px] h-[300px] object-center object-contain lg:object-cover rounded-lg shadow-lg cursor-pointer" onclick="openModal({{$index}})">
            @endforeach
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal hidden fixed z-20 inset-0 bg-black bg-opacity-70  items-center justify-center p-4" onclick="closeModal()">
            <div class="relative min-w-[500px] flex items-center justify-center">
                <img id="modalImage" class="rounded-lg  " src="" alt=""  >
                <span class=" absolute right-0 -bottom-20 md:-right-24 md:top-[50%] w-16 h-16 md:w-20 md:h-20 rounded-full md:text-xl  bg-gray-500/50 hover:bg-gray-500 flex items-center justify-center text-white cursor-pointer transition-colors" onclick="nextImage(event)">></span>
                <span class="absolute -bottom-20 md:-left-24 md:top-[50%] w-16 h-16 rounded-full  md:w-20 md:h-20   bg-gray-500/50 md:text-xl hover:bg-gray-500 flex items-center justify-center text-white cursor-pointer transition-colors" onclick="previousImage(event)"><</span>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script>
    const images = @json($images);
    const albumName = @json($album->name) 
    let currentIndex = 0;
    function openModal(index) {
        currentIndex = index
        const modal = document.getElementById('myModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = `/images/albums/${albumName}/images/${images[currentIndex].image_path}`;
        modal.classList.add('open');
    }

    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.classList.remove('open');
    }
    function nextImage(e){
   e.stopPropagation() 
        if(currentIndex == images.length-1){
            currentIndex = 0;
        } else{
            currentIndex++;
        }
        openModal(currentIndex)
    }

    function previousImage(e){
   e.stopPropagation() 
        if(currentIndex == 0){
            currentIndex = images.length -1;
        } else{
            currentIndex--;
        }
        openModal(currentIndex)
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
@endsection --}}

@extends('layouts.app')
@section('title', $title)

@section('content')
<div class="container mx-auto px-4 py-6 relative">
    <div class="flex flex-col">
        <!-- Album Details -->
        <div class="flex flex-col items-center">
            <h1 class="text-2xl 2xl:text-3xl font-bold mb-4">{{ $album->name }}</h1>
            <p class="text-gray-700 mb-6">{{ $album->description }}</p>
        </div>
        
        <!-- Images Grid -->
        <div class="flex gap-8 max-sm:flex-col items-center sm:justify-center flex-wrap">
            @foreach ($images as $index => $image)
                <img 
                    src="{{ asset('/images/albums/' . $album->name . '/images/' . $image->image_path) }}" 
                    alt="{{ $album->name }}" 
                    class="w-[300px] h-[300px] object-center object-contain lg:object-cover rounded-lg shadow-lg cursor-pointer"
                    data-index="{{ $index }}" 
                    onclick="openModal(this)">
            @endforeach
        </div>

        <!-- Modal -->
        <div id="imageModal" class="modal hidden fixed z-20 inset-0 bg-black bg-opacity-70 items-center justify-center p-4">
            <div class="relative flex items-center justify-center">
                <img id="modalImage" class="rounded-lg" src="" alt="Modal Image">
                <button 
                    class="absolute right-0 -bottom-20 md:-right-24 md:top-1/2  w-12 h-12 md:w-16 md:h-16 bg-gray-500/50 hover:bg-gray-500 text-white rounded-full"
                    onclick="changeImage(1)">
                    &gt;
                </button>
                <button 
                    class="absolute left-0 -bottom-20 md:-left-24 md:top-1/2  w-12 h-12 md:w-16 md:h-16 bg-gray-500/50 hover:bg-gray-500 text-white rounded-full"
                    onclick="changeImage(-1)">
                    &lt;
                </button>
            </div>
            <button 
                class="absolute top-4 right-4 text-white text-2xl font-bold cursor-pointer" 
                onclick="closeModal()">✕</button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const images = @json($images);
    const albumName = @json($album->name);
    console.log(albumName)
    let currentIndex = 0;

    function openModal(element) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        currentIndex = parseInt(element.dataset.index);
        modalImage.src = `/images/albums/${albumName}/images/${images[currentIndex].image_path}`;
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
    }

    function changeImage(direction) {
        currentIndex = (currentIndex + direction + images.length) % images.length;
        const modalImage = document.getElementById('modalImage');
        modalImage.src = `/images/albums/${albumName}/images/${images[currentIndex].image_path}`;
    }

    // Close modal on background click
    document.getElementById('imageModal').addEventListener('click', (e) => {
        if (e.target.id === 'imageModal') closeModal();
    });
</script>
@endsection
<style>
.modal {
    display: none;
}
.modal:not(.hidden) {
    display: flex;
}
.modal img {
    max-height: 90vh;
    max-width: 90vw;
}
</style>
