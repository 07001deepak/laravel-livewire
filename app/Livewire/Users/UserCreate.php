<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;

class UserCreate extends Component
{
    public function render()
    {
        return view('livewire.users.user-create');
    }

    #[Validate('required|min:3|max:50')]
    public $name;
    #[Validate('required|email|min:3|max:50|unique:users,email')]
    public $email;

    public function store()
    {
        $this->validate();
        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make('demo')
            ]);
            success('New User has been created successfully!');
            return $this->redirectRoute('users', navigate: true);
        } catch (\Exception $e) {
            error('Something went wrong. Please try again'. $e->getMessage());
        }
    }
}
