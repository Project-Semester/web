<?php

namespace App\Http\Livewire\Author;

use App\Services\CategoryService;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoryEditForm extends Component
{
    use WithFileUploads;
    public string $title;
    
    public string $synopsis;

    public $cover;
    
    public string $category_id;

    protected $rules = [
        'title' => ['required', 'string', 'max:225'],
        'synopsis' => ['required', 'string'],
        'cover' => ['nullable', 'image', 'file', 'max:2048'],
        'category_id' => ['required', 'string', 'uuid'],
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
