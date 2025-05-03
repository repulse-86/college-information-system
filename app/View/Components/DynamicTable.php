<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DynamicTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  array  $columns
     * @param  array  $rows
     * @return void
     */
    public function __construct(public array $columns, public array $rows) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dynamic-table');
    }
}
