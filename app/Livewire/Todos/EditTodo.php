<?php

namespace App\Livewire\Todos;

use Illuminate\View\View;
use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditTodo extends Component
{
    public Todo $todo;

    #[Rule('required|string|min:6|max:255')]
    public string $description = '';

    public function mount(): void
    {
        $this->description = $this->todo->description;
    }

    public function updateTodo(): void
    {
        $this->authorize('update', $this->todo);

        $validated = $this->validate();

        $this->todo->update($validated);

        $this->dispatch('todoUpdated');
    }

    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function cancel(): void
    {
        $this->dispatch('todoEditCancelled');
    }

    public function render(): View
    {
        return view('livewire.todos.edit-todo');
    }
}
