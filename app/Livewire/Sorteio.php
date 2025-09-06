<?php

namespace App\Livewire;

use Livewire\Component;

class Sorteio extends Component
{
    public $inputNomes = '';
    public $nomes = [];

    public function render()
    {
        return view('livewire.sorteio');
    }
}
