<?php

namespace App\Livewire\Todos;

use Livewire\Component;

class NewTodoForm extends Component
{
    public string $description;

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

    public function render()
    {
        return view('livewire.todos.new-todo-form');
    }
}
