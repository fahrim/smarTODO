<?php

namespace App\Livewire\Todos;

use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NewTodoForm extends Component
{
    public $pageTitle = 'New Todo';

    #[Rule('required|string|min:6|max:255')]
    public string $description = '';


    public function addTodo(): void
    {
        $validated = $this->validate();

        auth()->user()->todos()->create($validated);

        $this->reset('description');

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
