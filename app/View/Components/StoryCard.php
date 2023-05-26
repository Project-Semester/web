<?php

namespace App\View\Components;

use App\Models\Story;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StoryCard extends Component
{
    public Story $story;

    /**
     * Create a new component instance.
     */
    public function __construct(Story $story)
    {
        $this->story = $story;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.story-card');
    }
}
