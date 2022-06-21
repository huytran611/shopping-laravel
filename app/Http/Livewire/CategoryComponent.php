<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    use WithPagination;
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate("App\Models\Product");
       // session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');

    }

    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if($this->sorting == 'date')
        {
            $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->get();
        }
        else if($this->sorting == 'price')
        {
            $products = Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->get();
        }
        else if($this->sorting == 'price-desc')
        {
            $products = Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->get();
        }
        else{
            $products = Product::where('category_id',$category_id)->get();
        }

        $categories = Category::all();
        
        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name])->layout('homepage.index');
    }
}
