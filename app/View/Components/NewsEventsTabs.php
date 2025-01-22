<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\News;
use App\Models\Event;

class NewsEventsTabs extends Component
{
    public $news;
    public $events;
    public function __construct()
    {
            $this->news = News::all();
            $this->events = Event::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-events-tabs');
    }
}
