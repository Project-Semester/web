<?php

namespace App\Http\Livewire\Admin;

use App\Services\StoryService;
use Livewire\Component;

class StoryList extends Component
{
    public string $search = '';

    public function updatingSearch()
    {
        $this->reset();
    }

    public function render()
    {
        $stories = StoryService::findAllStories($this->search);

        return view('livewire.admin.story-list', compact('stories'));
    }
}
