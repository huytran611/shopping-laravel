<?php

namespace App\Http\Livewire\Admin;

use App\Models\OptionGroups;
use Livewire\Component;

class AdminAttributesComponent extends Component
{

    public function deleteAttribute($attribute_id)
    {
        $pattribute = OptionGroups::find($attribute_id);
        $pattribute->delete();
        session()->flash('message','Attribute has been deleted successfully');
    }

    public function render()
    {
        $pattributes = OptionGroups::paginate(10);
        return view('livewire.admin.admin-attributes-component',['pattributes'=>$pattributes])->layout('homepage.index');
    }
}
