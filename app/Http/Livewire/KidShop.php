<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KidShop extends Component
{
    public function render()
    {
        return view('livewire.kid-shop')->layout('homepage.index');
    }
}
