<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $user,$name,$email, $role;
    public $roles = [];
    public $target = 'User Edit';
    public function mount($id){
        $this->user = User::with('roles')->find($id);
        $this->roles = Role::all();
        if($this->user){
            $this->name = $this->user?->name;
            $this->email = $this->user?->email;
            $this->role = $this->user?->roles->first()?->name;
        }
    }
    public function render()
    {
        return view('livewire.users.user-edit')->layout('components.layouts.main');
    }

    public function updateUser(){
        $this->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'role'=> 'required|exists:roles,name'
        ]);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->save();
        $this->user->syncRoles($this->role);
        success('Role updated successfully!..');
        return $this->redirectRoute('users',navigate:true);
    }
}
