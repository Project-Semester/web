<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryEditForm extends Component
{
    public Category $category;

    protected $rules = [
        'category.name' => ['sometimes', 'string', 'min:3'],
        'category.description' => ['sometimes', 'string', 'min:12'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.admin.category-edit-form');
    }
}
