<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Service;
use App\Models\News;

class Navbar extends Component
{
    public $services;
    public $news;
    public function __construct()
    {
        $this->services =  Service::all();
        $this->news = News::latest()->limit(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
