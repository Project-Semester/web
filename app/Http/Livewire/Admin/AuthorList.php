<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $authors = User::where('role', 'author')->simplePaginate();
        $authors = User::search($this->search)->where('role', 'author')->orderBy('created_at', 'desc')->simplePaginate(5);

        return view('livewire.admin.author-list', compact('authors'));
    }
}
