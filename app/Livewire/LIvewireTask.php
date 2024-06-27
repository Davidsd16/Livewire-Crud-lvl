<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class LivewireTask extends Component
{
    public $tasks;
    public $task;

    // Definir las reglas de validación
    protected $rules = [
        'task.text' => 'required|max:255', // Ajusta según tus necesidades
    ];

    public function mount()
    {
        $this->tasks = Task::all();
        $this->task = new Task();
    }

    public function updateTaskText($value)
    {
        $this->task['text'] = $value;
    }

    public function save()
    {
        $this->validate();

        $this->task->save();

        session()->flash('message', '¡Tarea guardada correctamente!');

        $this->task = new Task();
        $this->tasks = Task::all();
    }

    public function render()
    {
        return view('livewire.task', [
            'tasks' => $this->tasks,
        ]);
    }
}
