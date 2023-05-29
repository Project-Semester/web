<?php

namespace App\Http\Livewire\Author;

use App\Models\Episode;
use App\Models\Story;
use Livewire\Component;

class EpisodeEditForm extends Component
{
    public Episode $episode;

    protected $rules = [
        'episode.title' => 'required|string|max:255',
        'episode.body' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.author.episode-edit-form');
    }
}
