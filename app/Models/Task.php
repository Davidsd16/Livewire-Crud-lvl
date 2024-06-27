<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['text']; // Asegúrate de tener los campos que deseas llenar

    // No necesitas el método mount() aquí, ya que es para componentes Livewire
}
