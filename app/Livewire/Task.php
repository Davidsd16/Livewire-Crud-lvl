<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
use Livewire\Component;

class Task extends Component
{
    public $tasks;
    public ModelsTask $task;

    protected $rules = ['task.text' => 'nullable|max:40'];

    public function mount()
    {
        $this->tasks = ModelsTask::get();
        $this->task = new ModelsTask(); //dd($this->task);
        //die();
    }

    public function updatedTask()
    {
        dd($this->task['text']); // Verifica el valor actualizado
    }


    public function save()
    {
        dd($this->task['text']); // Verifica solo el campo 'text'
        
        $this->validate();
        dd($this->errors());

        if (!empty($this->task['text'])) {
            $task = new ModelsTask(['text' => $this->task['text']]);
            $task->save();
            $this->mount();
        
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
