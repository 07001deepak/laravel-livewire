<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    public $target = 'login';

    public function render()
    {
        return view('livewire.auth.login');
    }

    #[Validate('required|email|exists:users,email')]
    public $email;
    #[Validate('required')]
    public $password;

    public function login()
    {
        $this->validate();
        try {
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                $user = User::select('name')->whereEmail($this->email)->first();
                session()->regenerate();
                success('Welcome ' . $user?->name . " !..");
                return $this->redirectRoute('dashboard', navigate: true);
            }
            error('Invalid Credentials. Please verify your credentials');
            return $this->redirectRoute('login', navigate: true);
        } catch (\Exception $e) {
            error('Something went wrong. Please try again.');
        }
    }
}
