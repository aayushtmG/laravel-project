  {{-- removed carousel  --}}
  {{-- <div x-data="carousel_main" x-init="start" class="relative overflow-hidden  h-min lg:h-[80vh] ">
        <!-- Images -->
        <div 
            class="flex transition-transform duration-700 ease-in-out w-full h-full " 
            :style="`transform: translateX(-${currentIndex * 100}%)`"
        >
            <template x-for="(image, index) in images" :key="index" >
            <div class="w-full min-h-full flex-shrink-0  ">
                <img 
                    :src="image" 
                    class="object-cover w-full h-full" 
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
                this.stop();
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
                this.start();
            },

            // Navigate to the previous image
            prev() {
                this.stop();
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                this.start();
            },

            // Go to a specific image
            goTo(index) {
                this.stop();
                this.currentIndex = index;
                this.start();
            }
        }));
    });
</script> --}}
<style>
  .slider-container {
    width: 100%;
   margin:0 auto; 
  }

  .carousel {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: flex-start;
  }

  .slider {
    display: flex;
    height: 100%;
    transition: transform 0.5s ease-out;
    flex-shrink: 0;
  }

  .slider .slide {
    width: 100%;
  }
</style>
 <div  class="relative overflow-hidden  h-min lg:h-[80vh] slider-container">
        <!-- Images -->
        <div 
            class="flex transition-transform duration-700 ease-in-out w-full h-full carousel" 
        >
            <div class="slider " style="width: {{count($images) * 100}}%;">
            @foreach ($images as $image)
                <div class="slide w-full">
                    <img src={{$image}} 
                        class="object-cover w-full h-full " 
                        alt="Carousel Image"
                    >
                </div>
            @endforeach
            </div>
                
        </div>
        <!-- Navigation Buttons -->
        <button 
            {{-- @click="prev()"  --}}
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-full prev"
        >
            &#8592;
        </button>
        <button 
            {{-- @click="next()"  --}}
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-full next"
        >
            &#8594;
        </button>

        <!-- Indicators -->
        {{-- <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
            @foreach ($images as $index => $image)
                <div 
                    class="indicator bg-white w-3 h-3 rounded-full cursor-pointer"
                    onclick="goTo({{$index+1}})"
                ></div>
            @endforeach
        </div> --}}
    </div>
<script>
  const slider = document.querySelector('.slider')
  const carousel = document.querySelector('.carousel')
  const prevBtn = document.querySelector('.prev')
  const nextBtn = document.querySelector('.next')
  const images = @json($images);

  //for auto start
  const timer = null
  let currentIndex =0

  let direction = -1;
function next(){
     stop();
    if (direction == 1) {
      slider.prepend(slider.lastElementChild);
      direction = -1
    }
    
    carousel.style.justifyContent = 'flex-start'
    slider.style.transform = `translate(-${100/images.length}%)`
    
    // Update currentIndex
    currentIndex = (currentIndex + 1) % images.length;
   updateIndicators() 
    start()
  }
  function prev() {
     stop();
    if (direction == -1) {
      slider.appendChild(slider.firstElementChild);
      direction = 1
    }
    carousel.style.justifyContent = 'flex-end'
    slider.style.transform = `translate(${100/images.length}%)`
    // Update currentIndex
    currentIndex = (currentIndex - 1) % images.length;
   updateIndicators() 
     start();
  }

  nextBtn.addEventListener('click',next)

  prevBtn.addEventListener('click',prev )

  slider.addEventListener('transitionend', function () {
    if (direction == -1) {
      slider.appendChild(slider.firstElementChild);
    } else if (direction == 1) {
      slider.prepend(slider.lastElementChild);
    }
    slider.style.transition = 'none'
    slider.style.transform = 'translate(0)';
    setTimeout(() => {
      slider.style.transition = 'transform 0.5s ease-out'
    });
  })
            // Start the auto-slide
           function start() {
                this.timer = setInterval(() => {
                    next();
                }, 4000); // Auto-slide every 4 second
            }
            // Stop auto-slide (if needed)
            function stop() {
                clearInterval(this.timer);
            }
            //start sliding automatically
            start();

// // Go to a specific slide
// function goTo(targetIndex) {
//     if(targetIndex > currentIndex){
//         const times = targetIndex - (currentIndex+1);
//         for(let i =0 ; i < times; i++){
//             next();
//         }
//     }
// }


function updateIndicators() {
    const indicators = document.querySelectorAll('.indicator'); // Assuming indicators have a class "indicator"
    indicators.forEach((indicator, index) => {
        if (index === currentIndex) {
            indicator.classList.add('bg-white');
            indicator.classList.remove('bg-gray-400');
        } else {
            indicator.classList.add('bg-gray-400');
            indicator.classList.remove('bg-white');
        }
    });
}

updateIndicators();
</script>