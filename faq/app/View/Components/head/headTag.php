<?php

namespace App\View\Components\head;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headTag extends Component
{
    public function __construct( )
    {
        
    }
 

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.head.head-tag');
    }
}