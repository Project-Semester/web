<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CategoryForm extends Component
{
    public string $name;

    public function render()
    {
        return view('livewire.admin.category-form');
    }
}
