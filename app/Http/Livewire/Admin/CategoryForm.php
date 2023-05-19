<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CategoryForm extends Component
{
    public string $name;
    public string $description;

    protected $rules = [
        'name' => ['required', 'string', 'min:3', 'unique:categories,name'],
        'description' => ['required', 'string', 'min:12'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.admin.category-form');
    }
}
