<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;

class Loginform extends Component
{
    public string $email;

    public string $password;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.author.loginform');
    }
}
