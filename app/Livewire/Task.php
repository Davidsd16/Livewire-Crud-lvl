<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
use Livewire\Component;

class Task extends Component
{
    public $tasks;
    public ModelsTask $task;

    protected $rules = ['task.text' => 'required|max:40'];

    public function mount()
    {
        $this->task = new ModelsTask(['text' => '']); // Initialize with an empty text
        $this->tasks = ModelsTask::get();
    }
    

    public function updatedTask()
    {

    }

    public function save()
    {
        $this->validate([
            'task.text' => 'required|max:40',
        ]);


        if (!empty($this->task->text)) {
            $task = new ModelsTask(['text' => $this->task->text]);
            $task->save();

            session()->flash('message', 'Tarea guardada correctamente!');

        } else {
            session()->flash('error', 'El campo de texto no puede estar vacío.');
        }
    }

    public function render()
    {
        return view('livewire.task', [
            'tasks' => $this->tasks,
        ]);
    }
}
