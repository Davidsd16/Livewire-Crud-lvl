<?php

namespace App\Livewire;

use Livewire\Component;

class MainComponent  extends Component
{
    public $welcome = '!Bienvenido! Comenzamos con las nuevas tareas :)';

    public function render()
    {
        return view('livewire.main');
    }
}
