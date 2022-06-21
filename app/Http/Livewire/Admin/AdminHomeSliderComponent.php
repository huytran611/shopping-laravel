<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlide($slide_id)
    {
        $slider = HomeSlider::find($slide_id);
        if($slider->image)
        {
            unlink('assets/images/sliders'.'/'.$slider->image); // xóa ảnh trong folder
        }
        $slider->delete();
        session()->flash('message','Slide has been deleted successfully');
    }

    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('homepage.index');
    }
}
