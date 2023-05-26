<?php

namespace App\View\Components;

use App\Models\Episode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EpisodeCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Episode $episode,
        public bool $link = false,
        public bool $body = false
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.episode-card');
    }
}
