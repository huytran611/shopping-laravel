<?php

namespace App\Http\Livewire;

use App\Models\AttributeValue;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class DetailsComponent extends Component
{
    use WithPagination;
    public $slug;
    public $qty;
    public $satt=[];
    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'satt' => 'required'
        ]);
    }

    public function store($product_id,$product_name,$qty,$product_price)
    {
        $this->validate([
            'satt' => 'required'
        ]);

        if(array_search("Select",$this->satt) ) //Option = "Select" => error
        {
            session()->flash('message','Hãy cho chúng tôi biết bạn muốn màu (size) gì!?');
        }
        else
        {
            Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,$this->satt)->associate('App\Models\Product');
            return redirect()->route('product.cart');
        }
       // session()->flash('success_message','Item added in Cart');
        

    }
    public function render()
    {

        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component',['product'=>$product, 'popular_products'=>$popular_products,'related_products'=>$related_products])->layout('homepage.index');
    }
}
