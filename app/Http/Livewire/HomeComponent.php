<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{   
    use WithPagination;
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate("App\Models\Product");
       // session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(12);
        $sproducts = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(4);
        
        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
        }
        return view('livewire.home-component',['lproducts'=>$lproducts,'sliders'=>$sliders,'sproducts'=>$sproducts])->layout('homepage.index');
    }
}
