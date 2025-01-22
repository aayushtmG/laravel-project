<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\News;
class NewsEventsTabs extends Component
{
    public $news;
    public $events;
    public function __construct()
    {
        //todo: make this dynamic
            $this->news = News::all();

            $this->events = collect([
                [
                    'title' => 'First Event',
                    'image' => '/images/banner.jpg',
                    'start_date' => now()->addDays(1),
                    'end_date' => now()->addDays(2),
                    'description' => 'Event description here'
                ],
                [
                    'title' => 'Second Event',
                    'image' => '/images/banner-1.jpg',
                    'start_date' => now()->addDays(3),
                    'end_date' => now()->addDays(4),
                    'description' => 'Another event description'
                ],
                // Add more dummy events as needed
            ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-events-tabs');
    }
}
