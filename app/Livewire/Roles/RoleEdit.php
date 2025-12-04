<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEdit extends Component
{
    public $role;
    public $allPermissions= [];
    public $permissions = [];
    public $target = 'Role Edit';
    public $name;
    public function mount($id) {
        $this->role = Role::with('permissions')->find($id);
        $this->allPermissions = Permission::all();
        $this->permissions = $this->role->permissions->pluck('name')->toArray();
        $this->name = $this->role->name;
    }
    public function render()
    {
        return view('livewire.roles.role-edit')->layout('components.layouts.main');
    }
    public function updateRole($id){
        $this->validate([
            'name' => 'required|unique:roles,name,'.$id
        ]);
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $this->name
        ]);
        $role->syncPermissions($this->permissions);
        success('Role Updated Successfully!..');
        return $this->redirectRoute('roles',navigate:true);

    }
}
