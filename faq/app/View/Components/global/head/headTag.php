<?php

namespace App\View\Components\global\head;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headTag extends Component
{
    public $title;
    public function __construct( $title = null)
    {
        $this->title = $title;
    }
 

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.global.head.head-tag');
    }
}
