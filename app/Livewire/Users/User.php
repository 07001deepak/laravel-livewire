<?php

namespace App\Livewire\Users;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $users;
    public function  mount()
    {
        $this->users = ModelsUser::latest()->get();
    }
    public function render()
    {
        return view('livewire.users.user')->with([
            'users' => $this->users
        ]);
    }
}
