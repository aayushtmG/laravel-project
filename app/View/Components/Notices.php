<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notices extends Component
{
    public $notices;
    public function __construct()
    {
        //todo: make this dynamic
        $this->notices = collect([
                    ['title' => 'First Notice Item',
                    'created_at' => now()->subDays(1),
                    'content' => 'Some news content here'
                    ]
                    ,
            [
                    'title' => 'Second Notice Item',
                    'created_at' => now()->subDays(2),
                    'content' => 'Some news content here'
        ],
        ]);
    }
    public function render(): View|Closure|string
    {
        return view('components.notices');
    }
}
