<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $services;
    public function __construct()
    {
        $this->services = collect([
            [
                'service_name'=>'Abbs Service',
                'link'=>'abbs-service'
            ],
            [
                'service_name'=>'Debit Card',
                'link'=>'debit-card'
            ],
            [
                'service_name'=>'Free Mobile Banking Service',
                'link'=>'free-mobile-banking-service'
            ],
            [
                'service_name'=>'SMS Service',
                'link'=>'sms-service'
            ],
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
