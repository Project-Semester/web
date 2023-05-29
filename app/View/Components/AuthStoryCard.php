<?php

namespace App\View\Components;

use App\Models\Story;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthStoryCard extends Component
{
    public Story $story;

    /**
     * Create a new component instance.
     */
    public function __construct($story)
    {
        $this->story = $story;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth-story-card');
    }
}
