<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{

    public $welcome = '!Bienvenido! comenzamos con las nuevas tareas :)';

    public function render()
    {
        return view('livewire.main');
    }
}
