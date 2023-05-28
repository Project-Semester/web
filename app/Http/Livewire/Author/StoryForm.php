<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;

class StoryForm extends Component
{
    public string $title;

    public string $synopsis;

    public string $category;

    public string $episode;

    public string $isi_cerita;

    protected $rules = [
        'title' => ['required', 'string', 'min:3'],
        'synopsis' => ['required', 'text'],
        'category' => ['required', 'string'],
        'episode' => ['required', 'string'],
        'isi_cerita' => ['required', 'text'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.author.story-form');
    }
}
