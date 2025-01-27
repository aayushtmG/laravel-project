  <div x-data="carousel_main" x-init="" class="relative overflow-hidden  h-min lg:h-[80vh] ">
        <!-- Images -->
        <div 
            class="flex transition-transform duration-700 ease-in-out w-full h-full " 
            :style="`transform: translateX(-${currentIndex * 100}%)`"
        >
            <template x-for="(image, index) in images" :key="index">
            <div class="w-full h-full flex-shrink-0  ">
                <img 
                    :src="image" 
                    class="object-cover w-full  lg:h-full" 
                    alt="Carousel Image"
                >
            </div>
            </template>
        </div>
        <!-- Navigation Buttons -->
        <button 
            @click="prev()" 
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-full"
        >
            &#8592;
        </button>
        <button 
            @click="next()" 
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-full"
        >
            &#8594;
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <template x-for="(image, index) in images" :key="index">
                <div 
                    :class="{'bg-white': currentIndex === index, 'bg-gray-400': currentIndex !== index}" 
                    class="w-3 h-3 rounded-full cursor-pointer"
                    @click="goTo(index)"
                ></div>
            </template>
        </div>
    </div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('carousel_main', () => ({
            // images: [
            //     '/images/banner-1.jpg',
            //     '/images/banner-2.jpg',
            // // Replace with Laravel dynamic images
            images: @json($images),
            currentIndex: 0,
            timer: null,

            // Start the auto-slide
            start() {
                this.timer = setInterval(() => {
                    this.next();
                }, 4000); // Auto-slide every 1 second
            },

            // Stop auto-slide (if needed)
            stop() {
                clearInterval(this.timer);
            },

            // Navigate to the next image
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            },

            // Navigate to the previous image
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            },

            // Go to a specific image
            goTo(index) {
                this.currentIndex = index;
            }
        }));
    });
</script>