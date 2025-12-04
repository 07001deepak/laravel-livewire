<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $target = 'createUser';
    public $roles = [];
    public function mount(){
        $this->roles = Role::all(); 
    }
    public function render()
    {
        return view('livewire.users.user-create')->layout('components.layouts.main');
    }

    #[Validate('required|min:3|max:50')]
    public $name;
    #[Validate('required|email|min:3|max:50|unique:users,email')]
    public $email;

    #[Validate('required')]
    public $role;
    public function createUser()
    {
        $this->validate();
        try {
            DB::transaction(function(){
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make(str_replace($this->name,'', ' ') . '@123')
            ]);
            $user->assignRole($this->role);    
            });
            
            success('New User has been created successfully!');
            return $this->redirectRoute('users', navigate: true);
        } catch (\Exception $e) {
            error('Something went wrong. Please try again'. $e->getMessage());
        }
    }
}
