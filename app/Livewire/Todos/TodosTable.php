<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class TodosTable extends Component
{
    use withPagination;

    public $pageTitle = 'My Todos Table';

    #[Url(as:'q', history: true)]
    public $search = '';

    public $sortField = 'created_at';

    public $sortDirection = 'desc';

    public $perPage = 10;

    protected function queryString()
    {
        return [
            'search' => ['as' => 'q'],
            'sortBy' => ['as' => 'sort'],
            'sortDirection' => ['as' => 'direction'],
        ];
    }

    #[On('todoAdded')]
    public function updateTodosList(): void
    {
        $this->reset('this.todos');
    }

    public function getTodosProperty(): mixed
    {
        return auth()->user()->todos()
            ->where('description', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortDirection)
            // ->simplePaginate($this->perPage);
            ->paginate($this->perPage);
    }

    public function clearSearch(): void
    {
        $this->reset('search');
        $this->reset('sortField');
        $this->reset('sortDirection');
    }

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function delete(Todo $todo): void
    {
          $this->authorize('delete', $todo);

        $todo->delete();
    }

    public function render(): View
    {
        return view('livewire.todos.todos-table', [
            'todos' => $this->getTodosProperty(),
        ]);
    }
}
