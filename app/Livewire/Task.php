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
        $this->tasks = ModelsTask::get();
        $this->task = new ModelsTask();
    }

    public function save()
    {
        $this->validate();
        $task = new ModelsTask(['text' => $this->task['text']]);
        $task->save();
        $this->mount();
    
        session()->flash('message', 'Tarea guardada correctamente!');
    }
    

    public function render()
    {
        return view('livewire.task', [
            'tasks' => $this->tasks,
        ]);
    }
}
