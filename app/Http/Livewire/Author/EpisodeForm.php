<?php

namespace App\Http\Livewire\Author;

use App\Models\Story;
use Livewire\Component;

class EpisodeForm extends Component
{
    public Story $story;

    public string $title;
    public string $body;

    protected $rules = [
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.author.episode-form');
    }
}
