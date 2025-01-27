<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Slider;

class MainCarouselSlide extends Component
{
    public array $images;
    public function __construct()
    { 
    $this->images = Slider::all()->map(function ($slider) {
            return asset('images/sliders/' . $slider->image);
        })->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-carousel-slide');
    }
}
