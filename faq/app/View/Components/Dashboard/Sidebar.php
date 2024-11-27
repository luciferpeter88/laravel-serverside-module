<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $sidebarName;
    public $routes;
    public function __construct(array $sidebarName, array $routes)
    {
        $this->sidebarName = $sidebarName;
        $this->routes = $routes;
    }
  

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.sidebar');
    }
}
