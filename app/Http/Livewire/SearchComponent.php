<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate("App\Models\Product");
       // session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');

    }

    public function mount()
    {
        $this->sorting = "default";
        $this->fill(request()->only('search','product_cat','product_cat_id')); 
    }

    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id. '%')->orderBy('created_at','DESC')->get();
        }
        else if($this->sorting == 'price')
        {
            $products = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id. '%')->orderBy('regular_price','ASC')->get();
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id. '%')->orderBy('regular_price','DESC')->get();
        }
        else{
            $products = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id. '%')->get();
        }

        $categories = Category::all();
        
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories])->layout('homepage.index');
    }
}
