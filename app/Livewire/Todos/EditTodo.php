<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditTodo extends Component
{
    public Todo $todo;

    #[Rule('string|max:255')]
    public ?string $title = '';

    #[Rule('required|string|min:6|max:255')]
    public string $description = '';

    #[Rule('nullable|date:Y-m-d')]
    public ?string $due_date = null;

    #[Rule('boolean')]
    public bool $completed = false;

    #[Rule('nullable|date')]
    public $completed_at = null;

    public function mount(): void
    {
        $this->title = $this->todo->title;
        $this->description = $this->todo->description;
        $this->due_date = $this->todo->due_date?->format('Y-m-d');
        $this->completed = $this->todo->completed;
        $this->completed_at = $this->todo->completed_at;
    }

    public function updateTodo(): void
    {
        $this->authorize('update', $this->todo);

        $validated = $this->validate();

        $validated['completed_at'] = $validated['completed'] ? now() : null;

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
