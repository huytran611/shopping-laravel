<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SalePageComponent extends Component
{
    public function render()
    {
        $sproducts = Product::where('sale_price','>',0)->get();
        return view('livewire.sale-page-component',['sproducts'=>$sproducts])->layout('homepage.index');
    }
}
