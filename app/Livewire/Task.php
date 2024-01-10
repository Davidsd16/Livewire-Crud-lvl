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
        var_dump('mount');
        $this->task = new ModelsTask();
        $this->tasks = ModelsTask::get();
    }

    public function updatedTask()
    {
        var_dump('updatedTask');
        //dd($this->task['text']);
    }

    public function save()
    {
        var_dump('save');
        
        $this->validate();
        var_dump($this->task->text); // Acceder a la propiedad text de la instancia ModelsTask

        $errors = $this->getErrorBag();

        if ($errors->any()) {
            dd($errors->all());
        }

        if (!empty($this->task->text)) {
            var_dump('entro en if de save');

            $task = new ModelsTask(['text' => $this->task->text]); // Acceder a la propiedad text de la instancia ModelsTask
            $task->save();
            $this->mount();
            session()->flash('message', 'Tarea guardada correctamente!');
        } else {
            var_dump('else de save');

            session()->flash('error', 'El campo de texto no puede estar vacío.');
        }
    }

    public function render()
    {
        var_dump('render');

        return view('livewire.task', [
            'tasks' => $this->tasks,
        ]);
    }
}
