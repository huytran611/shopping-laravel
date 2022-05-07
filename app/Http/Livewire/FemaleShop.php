<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FemaleShop extends Component
{
    public function render()
    {
        return view('livewire.female-shop')->layout('homepage.index');
    }
}
