
<div>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2" wire:ignore>
                <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="" width="100%" id="productimg">
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
                <select name="size">
                    <option value="">Chọn Size</option>
                    @foreach ($size as $item)
                        @if ($item->product_id == $product->id && $item->option_group_id == 1)
                        <option value="size">{{$item->option_id}}
                        </option>
                        @endif
                    @endforeach
                        
                </select>
                <select name="color">
                    <option value="">Chọn Màu</option>
                    @foreach ($size as $item)
                        @if ($item->product_id == $product->id && $item->option_group_id == 2)
                        <option value="size">{{$item->option_id}}</option>
                        @endif
                    @endforeach  
                </select>
                <input class="input-cart" type="text" value="1">
                <button class="btn-increase" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</button>
                <button class="btn-decrease" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</button>
                <br>
                <a href="" class="btn" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Thêm vào giỏ</a>
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
