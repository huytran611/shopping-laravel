<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountRegister extends Component
{
    public function render()
    {
        return view('livewire.account-register')->layout('homepage.index');
    }
}
