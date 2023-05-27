<?php

namespace App\Http\Livewire\Author;

use App\Services\CategoryService;
use Livewire\Component;

class CategoryList extends Component
{
    public string $search = '';

    public function updatingSearch()
    {
        $this->reset();
    }

    public function render()
    {
        $categories = CategoryService::findAll($this->search);
        return view('livewire.author.category-list', compact('categories'));
    }
}
