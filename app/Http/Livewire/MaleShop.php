<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MaleShop extends Component
{
    public function render()
    {
        return view('livewire.male-shop')->layout('homepage.index');
    }
}
