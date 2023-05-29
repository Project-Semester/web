<?php

namespace App\Http\Livewire\Author;

use App\Models\Story;
use App\Services\CategoryService;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoryEditForm extends Component
{
    use WithFileUploads;
    public Story $story;

    protected $rules = [
        'story.title' => ['required', 'string', 'max:225'],
        'story.synopsis' => ['required', 'string'],
        'story.cover' => ['nullable', 'image', 'file', 'max:2048'],
        'story.category_id' => ['required', 'string', 'uuid'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $categories = CategoryService::findAll(null);

        return view('livewire.author.story-edit-form', compact('categories'));
    }
}
