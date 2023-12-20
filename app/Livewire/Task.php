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
        $this->task = new ModelsTask();
        $this->tasks = ModelsTask::get();
    }

    public function updatedTask()
    {
        dd($this->task['text']);
    }

    public function save()
    {
        $this->validate();

        $errors = $this->getErrorBag();

        if ($errors->any()) {
            dd($errors->all());
        }
    
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
