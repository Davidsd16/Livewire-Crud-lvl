<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
//use App\Models\TaskModel;
use Livewire\Component;

class Task extends Component
{

    public $tasks;

    public function mount(){

        $this->tasks = ModelsTask::get();
    }

    public function render()
    {
        return view('livewire.task');
    }
}
