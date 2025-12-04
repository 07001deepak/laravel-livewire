<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    public $allRoles;
    public function mount(){
        $this->allRoles = ModelsRole::with('permissions')->get();
    }
    public function render()
    {
        return view('livewire.roles.role')->layout('components.layouts.main');
    }

    public function getConfirmDeleteRole($id){
       return $this->dispatch('confirmDeleteRole', id:$id);
    }

    #[On('deleteRoleConfirmed')]
    public function deleteRoleConfirmed($id){
        ModelsRole::find($id)->delete();
        success('Role Deleted Successfully');
        return $this->redirectRoute('roles',navigate:true);
    }
}
