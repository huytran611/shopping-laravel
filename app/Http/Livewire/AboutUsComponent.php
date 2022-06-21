<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class AboutUsComponent extends Component
{
    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.about-us-component',['setting' =>$setting])->layout('homepage.index');
    }
}
