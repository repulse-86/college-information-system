<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public array $links = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
            ['route' => 'instructors.index', 'label' => 'Instructors'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
