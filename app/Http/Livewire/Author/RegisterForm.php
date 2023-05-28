<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;
    public string $username;

    public string $email;

    public $photo;

    public string $password;

    public string $password_confirmation;

    protected $rules = [
        'username' => ['required', 'string', 'min:8'],
        'email' => ['required', 'email:dns', 'unique:users,email', 'string'],
        'photo' => ['image', 'file'],
        'password' => ['required', 'string', 'min:8'],
        'password_confirmation' => ['required', 'same:password'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.author.register-form');
    }
}

