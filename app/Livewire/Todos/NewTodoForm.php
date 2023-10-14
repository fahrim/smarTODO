<?php

namespace App\Livewire\Todos;

use Livewire\Component;

class NewTodoForm extends Component
{
    public string $description;
    public $pageTitle = 'New Todo';

    public function addTodo()
    {
        $this->validate([
            'description' => 'required|min:6',
        ]);

        $todo = auth()->user()->todos()->create([
            'description' => $this->description,
            'completed' => false,
        ]);

        $this->reset('description');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'description' => 'required|min:6',
        ]);
    }

    public function render()
    {
        return view('livewire.todos.new-todo-form');
    }
}
