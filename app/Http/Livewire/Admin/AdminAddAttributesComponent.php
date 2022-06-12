<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionGroups;
use Livewire\Component;

class AdminAddAttributesComponent extends Component
{

    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required'
        ]);
    }

    public function storeAttribute()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $pattribute = new OptionGroups();
        $pattribute->option_group_name = $this->name;
        $pattribute->save();
        session()->flash('message','Attribute has been created successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-attributes-component')->layout('homepage.index');
    }
}
