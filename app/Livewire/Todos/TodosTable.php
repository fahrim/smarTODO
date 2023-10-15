<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TodosTable extends Component
{
    use withPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $pageTitle = 'My Todos Table';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    #[On('todoAdded')]
    public function updateTodosList()
    {
        $this->reset('this.todos');
    }

    public function getTodosProperty()
    {
        return auth()->user()->todos()
            ->where('description', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortDirection)
            // ->simplePaginate($this->perPage);
            ->paginate($this->perPage);
    }

    public function delete(Todo $todo)
    {
        //  $this->authorize('delete', $todo);

        $todo->delete();
    }

    public function render()
    {
        return view('livewire.todos.todos-table', [
            'todos' => $this->getTodosProperty(),
        ]);
    }
}
