<?php

namespace App\Livewire;

use Livewire\Component;

class Roleta extends Component
{
    public string $inputNames = '';
    public array $names = [];
    public $isGenerated = false;

    public function updatedInputNames()
    {
        $this->names = preg_split('/[\s,]+/', $this->inputNames, -1, PREG_SPLIT_NO_EMPTY);
        $this->inputNames = !empty($this->names);
    }



    public function render()
    {
        return view('livewire.roleta');
    }
}
