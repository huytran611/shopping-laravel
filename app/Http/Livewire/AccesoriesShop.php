<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccesoriesShop extends Component
{
    public function render()
    {
        return view('livewire.accesories-shop')->layout('homepage.index');
    }
}
