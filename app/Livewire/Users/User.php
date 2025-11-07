<?php

namespace App\Livewire\Users;

use App\Models\User as ModelsUser;
use Livewire\Attributes\On;
use Livewire\Component;

class User extends Component
{
    public $target = 'user';
    public $users;
    public function  mount()
    {
        $this->users = ModelsUser::latest()->get();
    }
    public function render()
    {
        return view('livewire.users.user')->with([
            'users' => $this->users
        ])->layout('components.layouts.main');
    }

    public function productDelete($id){
        $this->dispatch('confirmUserDelete', id:$id);
    }

    #[On('deleteUserConfirmed')]
    public function deleteUserConfirmed($id){
        ModelsUser::findOrFail($id)->delete();
    }

    public function refreshUsers(){
        $this->users = ModelsUser::latest()->get();
    }
}
