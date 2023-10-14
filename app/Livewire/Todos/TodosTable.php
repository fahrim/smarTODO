<?php

namespace App\Livewire\Todos;

use Livewire\Component;
use Livewire\WithPagination;

class TodosTable extends Component
{
    use withPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 4;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }


    public function render()
    {
        $todos = auth()->user()->todos()
            ->where('description', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.todos.todos-table', [
            'todos' => $todos,
        ]);
    }

}
