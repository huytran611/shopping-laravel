
<div>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2" wire:ignore>
                <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="" width="400" id="productimg">
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="" width="100%" class="small-img">
                    </div>
                    @php
                        $images = explode(",",$product->images);
                    @endphp
                    @foreach ($images as $image)
                        @if ($image)
                        <div class="small-img-col">
                            <img src="{{asset('assets/images/products')}}/{{$image}}" alt="" class="small-img">
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-2">
                <h1>{{$product->name}}</h1>
                @if ($product->sale_price > 0)
                    <div style="flex-wrap: wrap; display:flex;margin-left:100px">
                    <h3 style="text-decoration:2px red line-through;">{{number_format($product->regular_price,0,'','.')}}đ</h3>
                    <h3 style="margin-left: 5px">{{$product->sale_price}}đ</h3>
                    </div>
                @else
                    <h3>{{number_format($product->regular_price,0,'','.')}}đ</h3>
                @endif 
                <h5>Tình trạng: {{$product->stock_status}}</h5>

                @foreach ($product->attributeValues->unique('product_attribute_id') as $av)
                    <div style="margin-top:20px">
                        <div>
                            <h5>{{$av->productAttribute->attribute_name}}</h5>
                        </div>
                        <div >
                            <select style="width:100px" wire:model="satt.{{$av->productAttribute->attribute_name}}">
                                <option>Select</option>
                                @foreach ($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                    <option value="{{$pav->value}}">{{$pav->value}}</option>
                                @endforeach
                            </select>
                            @error('satt') <p style="color:red;font-size:14px">Vui lòng chọn mục này</p>@enderror
                        </div>
                    </div>
                @endforeach
                <h5 style="margin-top:20px">Số lượng</h5>
                <input class="input-cart" type="text" value="0" wire:model="qty">
                <button class="btn-increase" wire:click.prevent="increaseQuantity">+</button>
                <button class="btn-decrease" wire:click.prevent="decreaseQuantity">-</button>
                <br>
                @if ($product->sale_price > 0)
                    <button class="btn" type="submit" style="width: 200px" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$qty}},{{$product->sale_price}})">Thêm vào giỏ</button>
                @else
                    <button class="btn" type="submit" style="width: 200px" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$qty}},{{$product->regular_price}})">Thêm vào giỏ</button>
                @endif
                <h3>Thông tin sản phẩm</h3>
                <p>{{$product->short_description}}</p>
            </div>
        </div>
            <h2 class="categories">Sản phẩm liên quan</h2>
            <div class="gallery">
                @foreach ($related_products as $r_products)
                <div class="content">
                    <a href="{{route('product.details',['slug'=>$r_products->slug])}}">
                    <img src="{{asset('assets/images/products')}}/{{$r_products->image}}" style="height: 400px;" alt="{{$r_products->name}}">
                    </a>
                    <a href="{{route('product.details',['slug'=>$r_products->slug])}}">
                    <h3 class="product-brand">{{$r_products->name}}</h3>
                </a>
                @if ($r_products->sale_price > 0)
                    <div style="flex-wrap: wrap; display:flex;margin-left:100px">
                        <h3 style="text-decoration:2px red line-through;">{{$r_products->regular_price}}đ</h3>
                        <h3 style="margin-left: 5px">{{$r_products->sale_price}}đ</h3>
                    </div>
                @else
                    <h3>{{$r_products->regular_price}}đ</span><span class="actual-price"></h3>
                @endif 
                <button class="buy-1" wire:click.prevent="store({{$r_products->id}},'{{$r_products->name}}',{{$r_products->regular_price}})">Buy Now</button>
                </div>
                @endforeach    
            </div>
    </div>
    <script>
        //Single Product JS
    var productimg = document.getElementById("productimg");
    var smallimg = document.getElementsByClassName("small-img");

    smallimg[0].onclick = function(){
        productimg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function(){
        productimg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function(){
        productimg.src = smallimg[2].src;
    }
    smallimg[3].onclick = function(){
        productimg.src = smallimg[3].src;
    }

    </script>
</div>
