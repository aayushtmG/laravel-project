<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Notice;

class Notices extends Component
{
    public $notices;
    public function __construct()
    {
        //todo: make this dynamic
        $this->notices = Notice::all();
        }
    public function render(): View|Closure|string
    {
        return view('components.notices');
    }
}
