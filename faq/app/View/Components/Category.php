<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    public $name;
    public $description;
    public $pageNumber;
    public function __construct($name, $description, $pageNumber)
    {
        $this->name = $name;
        $this->description = $description;
        $this->pageNumber = $pageNumber;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category');
    }
}
