<?php

namespace App\Livewire\Roles;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $target = 'Role-Create';
    public $allPermissions = [];
    public $role;

    public function mount()
    {
        $this->allPermissions = Permission::get();
    }
    public function render()
    {
        return view('livewire.roles.role-create')->layout('components.layouts.main');
    }


    public $name;
    public $permissions = [];
    public function createRole()
    {
        try {
            $this->validate([
                'name' =>'required|min:3|unique:users,name',
                'permissions' => 'required'
            ]);
            $role =  Role::create([
                'name' => $this->name
            ]);
            $role->syncPermissions($this->permissions);

            success('Role Created Successfully!..');
            return $this->redirectRoute('roles',navigate:true);
        } catch (\Exception $e) {
            Log::info('Error creating the roles', [$e->getMessage()]);
            return error($e->getMessage());
        }
    }
}
