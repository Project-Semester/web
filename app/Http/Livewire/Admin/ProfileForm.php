<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Component;

class ProfileForm extends Component
{
    public Authenticatable $user;

    protected $rules = [
        'user.username' => ['required', 'string', 'min:8'],
        'user.email' => ['required', 'string', 'email'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.admin.profile-form');
    }
}
