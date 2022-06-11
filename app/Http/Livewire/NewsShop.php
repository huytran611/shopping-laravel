<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class NewsShop extends Component
{
    
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate("App\Models\Product");
       // session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
        $this->emitTo('cart-count-component','refreshComponent');

    }

    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
    }

    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::orderBy('created_at','DESC')->get();
        }
        else if($this->sorting == 'price')
        {
            $products = Product::orderBy('regular_price','ASC')->get();
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::orderBy('regular_price','DESC')->get();
        }
        else{
            $products = Product::all();
        }

        $categories = Category::all();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }
        
        return view('livewire.news-shop',['products'=>$products,'categories'=>$categories])->layout('homepage.index');
    }
}
