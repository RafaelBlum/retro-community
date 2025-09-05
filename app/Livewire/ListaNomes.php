<?php

namespace App\Livewire;

use Livewire\Component;

class ListaNomes extends Component
{
    public $inputNomes = '';
    public $nomes = [];

    public function updatedInputNomes()
    {
        // Aceita vírgula ou espaço como separador
        $this->nomes = preg_split('/[\s,]+/', $this->inputNomes, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function render()
    {
        return view('livewire.lista-nomes');
    }
}
