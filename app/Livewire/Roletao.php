<?php

namespace App\Livewire;

use Livewire\Component;

class Roletao extends Component
{

    public string $inputNomes = '';
    public array $nomes = [];
    public string $result = '';
    public bool $girando = false;

    public function updatedInputNomes()
    {
        // Divide por vírgula, remove espaços e itens vazios
        $this->nomes = array_filter(array_map('trim', explode(',', $this->inputNomes)));
    }

    public function girar()
    {
        if(count($this->nomes) < 2) {
            $this->addError('inputNomes', 'Insira pelo menos 2 nomes.');
            return;
        }

        $this->girando = true;
        $this->result = '';

        $index = array_rand($this->nomes);
        $this->result = $this->nomes[$index];

        $this->dispatchBrowserEvent('girar-roleta', [
            'index' => $index,
            'total' => count($this->nomes)
        ]);
    }

    public function render()
    {
        return view('livewire.roletao');
    }
}
