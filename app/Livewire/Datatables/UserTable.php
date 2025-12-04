<?php

namespace App\Livewire\Datatables;

use App\Models\User;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchEnabled();
        $this->setQueryStringDisabled();
        $this->setLoadingPlaceholderStatus(true);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->searchable()->sortable()->hideIf(true),
            Column::make('S.No')
                ->label(fn($row, $column) => $this->getRowIndex($row))
                ->html(),
            Column::make("Name", "name")
                ->searchable()->sortable(),
            Column::make("Email", "email")
                ->searchable()->sortable(),
            Column::make("Created at", "created_at")
                ->searchable()->sortable(),
            Column::make("Updated at", "updated_at")
                ->searchable()->sortable(),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => $this->renderActionColumn($row->id)
                )->html(),
        ];
    }

    private function renderActionColumn($id)
    {
        return '
        <a  href="'.route("edit-user",$id).'"
            class="btn btn-primary btn-sm" wire:navigate>
            Edit
        </a>
        <button 
            class="btn btn-danger btn-sm"
            wire:click.prevent="$dispatch(\'confirmUserDelete\', { id: ' . $id . ' })">
            Delete
        </button>
    ';
    }



    public function confirmUserDelete($id)
    {
        $this->dispatch('confirmUserDelete', id: $id);
    }

    #[On('deleteUserConfirmed')]
    public function deleteUserConfirmed($id)
    {
        User::findOrFail($id)->delete();
        $this->skipRender();
        $this->dispatch('refreshUserTable');
    }

    protected int $counter = 0;

    public function getRowIndex($row)
    {
        static $index = 0;
        return ++$index;
    }

    #[On('refreshUserTable')]
    public function refreshUserTable(){
        $this->resetTable();
    }
}
