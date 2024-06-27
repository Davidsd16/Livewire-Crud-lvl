<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class LivewireTask extends Component
{
    public $tasks;
    public Task $task;

    protected $rules = ['task.text' => 'required|max:40'];

    public function mount()
    {
        $this->task = new Task(['text' => '']); // Inicializa con un texto vacío
        $this->tasks = Task::all(); // Obtén todas las tareas
    }

    public function updatedTask()
    {
        // Puedes implementar lógica adicional aquí si es necesario
    }

    public function save()
    {
        $this->validate();

        $this->task->save();
        
        session()->flash('message', '¡Tarea guardada correctamente!');

        $this->tasks = Task::all(); // Actualiza la lista de tareas después de guardar
    }

    public function render()
    {
        return view('livewire.task', [
            'tasks' => $this->tasks,
        ]);
    }
}
