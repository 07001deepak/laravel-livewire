<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|min:3|max:50')]
    public $name;
    #[Validate('required|email|min:3|max:50|unique:users,email')]
    public $email;
    #[Validate('required|min:6|same:confirm_password')]
    public $password;
    public $confirm_password;

    public function submit()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        return $this->redirect('/');
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
