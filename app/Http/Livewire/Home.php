<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $texto;
    public $texto_rubro;
    public $texto_vigencia_de_contrato;
    public function render()
    {
        return view('livewire.home');
    }
}
