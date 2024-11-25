<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    public $title;
    public $category;
    public $user;
    public $createdAt;
    public $answers;

    public function __construct($title, $category, $user, $createdAt, $answers)
    {
        $this->title = $title;
        $this->category = $category;
        $this->user = $user;
        $this->createdAt = $createdAt;
        $this->answers = $answers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post');
    }
}
