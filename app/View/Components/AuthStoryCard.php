<?php

namespace App\View\Components;

use App\Models\Story;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthStoryCard extends Component
{
    public Story $story;
    public bool $option;

    /**
     * Create a new component instance.
     */
    public function __construct($story, bool $option = false)
    {
        $this->story = $story;
        $this->option = $option;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth-story-card');
    }
}
