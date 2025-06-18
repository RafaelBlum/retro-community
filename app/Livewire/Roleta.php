<?php

namespace App\Livewire;

use Livewire\Component;

class Roleta extends Component
{
    public array $nomes = [];
    public string $inputNomes = '';
    public string $resultado = '';
    public bool $girando = false;

    public function gerarRoleta()
    {
        $this->reset('resultado');
        $this->nomes = array_filter(array_map('trim', explode(',', $this->inputNomes)));

        if (count($this->nomes) < 2) {
            $this->addError('inputNomes', 'Insira pelo menos 2 nomes separados por vírgula.');
        } else {
            $this->resetErrorBag();
        }
    }

    public function girar()
    {
        if (count($this->nomes) < 2) {
            $this->addError('inputNomes', 'Adicione pelo menos 2 nomes para sortear.');
            return;
        }

        $this->girando = true;
        $this->resultado = '';

        $index = array_rand($this->nomes);
        $this->resultado = $this->nomes[$index];

        $this->dispatchBrowserEvent('girar-roleta', [
            'index' => $index,
            'total' => count($this->nomes)
        ]);
    }

    public function render()
    {
        return view('livewire.roleta');
    }
}
