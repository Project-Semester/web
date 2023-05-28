<?php

namespace App\Http\Livewire\Author;

use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Component;

class ProfileForm extends Component
{
    public Authenticatable $user;

    protected $rules = [
        'user.photo' => ['image', 'file'],
        'user.username' => ['required', 'string', 'min:8'],
        'user.email' => ['required', 'string', 'email'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.author.profile-form');
    }
}
