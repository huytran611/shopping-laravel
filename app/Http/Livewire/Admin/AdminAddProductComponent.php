<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $quantity;
    public $image;
    public $category_id;
    public $images;

    public $attribute;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->sale_price = 0;
    }

    public function add()
    {
        if(!in_array($this->attribute,$this->attribute_arr))
        {
            array_push($this->inputs,$this->attribute);
            array_push($this->attribute_arr,$this->attribute);
        }
    }

    public function remove($attribute)
    {
        unset($this->inputs[$attribute]);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
            'slug'=> 'required|unique:products',
            'short_description'=> 'required',
            'description'=> 'required',
            'regular_price'=> 'required|numeric',
            'sale_price'=> 'numeric',
            'sku'=> 'required',
            'stock_status'=> 'required',
            'quantity'=> 'required|numeric',
            'image'=> 'required|mimes:jpg,jpeg,png',
            'category_id' => 'required'
        ]);
    }
    
    public function addProduct()
    {
        $this->validate([
           'name'=> 'required',
           'slug'=> 'required|unique:products',
           'short_description'=> 'required',
           'description'=> 'required',
           'regular_price'=> 'required|numeric',
           'sale_price'=> 'numeric',
           'sku'=> 'required',
           'stock_status'=> 'required',
           'quantity'=> 'required|numeric',
           'image'=> 'required|mimes:jpg,jpeg,png',
           'category_id' => 'required'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->sku = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->quantity = $this->quantity;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;

        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key. '.' . $image->extension();
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;
        }

        $product->category_id = $this->category_id;
        $product->save();

        foreach($this->attribute_values as $key=>$attribute_value)
        {
            $avalues = explode(",",$attribute_value);
            foreach($avalues as $avalue)
            {
                $attr_value = new AttributeValue();
                $attr_value->product_attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }

        session()->flash('message','Product has been created successfully');
    }

    public function render()
    {
        $categories = Category::all();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories,'pattributes'=>$pattributes])->layout('homepage.index');
    }
}
