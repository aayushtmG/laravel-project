<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServicesDetailBlock extends Component
{
    public $services;
   public function __construct()
    {
        //todo: make this dynamic
        $this->services = collect([
            [
                'icon' => '/images/icons/provider.png',
                'name' => 'ABBS Service',
                'description' => 'Any Branch Banking Service is one of our services ,which our members are highly benefited thorough out all our service centers. We provide ABBS service to our account holders throughout our branch network.' ,
                'link' => '/'
            ],
            [
                'icon' => '/images/icons/atm-machine.png',
                'name' => 'Debit Card (ATM Service)',
                'description' => 'Any Branch Banking Service is one of our services ,which our members are highly benefited thorough out all our service centers. We provide ABBS service to our account holders throughout our branch network.',
                'link'=> '/'
            ],
            [
                'icon' => '/images/icons/mobile-banking.png',
                'name' => 'Free Mobile Banking Service',
                'description' => 'Any Branch Banking Service is one of our services ,which our members are highly benefited thorough out all our service centers. We provide ABBS service to our account holders throughout our branch network.',
                'link'=> '/'
            ],
            [
                'icon' => '/images/icons/mobile-chat.png',
                'name' => 'SMS Service',
                'description' => 'Any Branch Banking Service is one of our services ,which our members are highly benefited thorough out all our service centers. We provide ABBS service to our account holders throughout our branch network.',
                'link'=> '/' 
            ]
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services-detail-block');
    }
}
