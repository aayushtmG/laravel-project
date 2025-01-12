<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsEventsTabs extends Component
{
    public $news;
    public $events;

    public function __construct()
    {
            $this->news = collect([
                [
                    'title' => 'First News Item',
                    'image' => '/images/banner-1.jpg',
                    'created_at' => now()->subDays(1),
                    'content' => 'Some news content here'
                ],
                [
                    'title' => 'Second News Item',
                    'image' => '/images/banner-2.jpg',
                    'created_at' => now()->subDays(2),
                    'content' => 'More news content'
                ],
                // Add more dummy news items as needed
            ]);

            // Dummy events data
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
