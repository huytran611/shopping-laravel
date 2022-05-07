<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class DetailsComponent extends Component
{
    use WithPagination;
    public $slug;


    public function increaseQuantity($rowId) //cập nhật số lượng sp 
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return 1;

    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component',['product'=>$product, 'popular_products'=>$popular_products,'related_products'=>$related_products])->layout('homepage.index');
    }
}
