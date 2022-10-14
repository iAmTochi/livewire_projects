<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class TodoList extends Component
{
    public $todos;

    public string $todoText = '';

    public function mount()
    {
        $this->selectTodos();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }

    private function selectTodos()
    {
        $this->todos = TodoItem::orderBy('created_at', 'DESC')->get();
    }

    public function addTodo()
    {
        $todo = new TodoItem();
        $todo->todo = $this->todoText;
        $todo->completed = false;
        $todo->save();

        $this->todoText = '';
        $this->selectTodos();
    }

    public function toggleTodo($id)
    {
        $todo = TodoItem::find($id);

        if (!$todo){
            return;
        }

        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function deleteTodo($id)
    {
        $todo = TodoItem::find($id);

        if (!$todo){
            return;
        }

        $todo->delete();
        $this->selectTodos();
    }
}
