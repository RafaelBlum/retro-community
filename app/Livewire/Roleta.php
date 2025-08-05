<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Roleta extends Component
{
    public array $nomes = [];
    public string $inputNomes = '';
    public string $resultado = '';
    public bool $girando = false;


//    public function gerarRoleta()
//    {
//        Log::info('Método gerarRoleta chamado xx');
//        $this->reset('resultado');
//
//        if (!$this->validarNomes()) return;
//    }
//
//    protected function validarNomes(): bool
//    {
//        $this->nomes = array_unique(array_filter(array_map('trim', explode(',', $this->inputNomes))));
//
//        if (count($this->nomes) < 2) {
//            $this->addError('inputNomes', 'Insira pelo menos 2 nomes separados por vírgula.');
//            return false;
//        }
//
//        $this->resetErrorBag();
//        return true;
//    }

    public function gerarRoleta()
    {
        Log::info('Método gerarRoleta chamado');

        // Limpa o resultado anterior
        $this->reset('resultado');

        // Divide a string em nomes, remove espaços e itens vazios
        $this->nomes = array_filter(array_map('trim', explode(',', $this->inputNomes)));

        // Valida se há pelo menos 2 nomes
        if (count($this->nomes) < 2) {
            $this->addError('inputNomes', 'Insira pelo menos 2 nomes separados por vírgula.');
        } else {
            $this->resetErrorBag();
        }
    }



    // Sorteia aleatoriamente um nome e dispara evento JS
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
