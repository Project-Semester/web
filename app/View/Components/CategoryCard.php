<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $index,
        public string $id,
        public string $name,
        public string $description,
        public string $color
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.category-card');
    }
}
