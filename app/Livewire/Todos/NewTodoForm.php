<?php

namespace App\Livewire\Todos;

use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NewTodoForm extends Component
{
    public $pageTitle = 'New Todo';

    #[Rule('string|max:255')]
    public ?string $title = '';

    #[Rule('required|string|min:6|max:255')]
    public string $description = '';

    #[Rule('nullable|date:Y-m-d H:i:s')]
    public ?string $due_date = null;

    #[Rule('boolean')]
    public bool $completed = false;

    #[Rule('nullable|date')]
    public $completed_at = null;

    public function addTodo(): void
    {
        $validated = $this->validate();

        $validated['completed_at'] = $validated['completed'] ? now() : null;

        auth()->user()->todos()->create($validated);

        $this->reset('title', 'description', 'due_date', 'completed');

        $this->dispatch('todoAdded');
    }

    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function render(): View
    {
        return view('livewire.todos.new-todo-form');
    }
}
