
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
                <h2>{{$product->name}}</h2>
                @if ($product->sale_price > 0)
                    <div style="flex-wrap: wrap; display:flex;">
                    <h3 style="text-decoration:2px red line-through;">{{number_format($product->regular_price,0,'','.')}}đ</h3>
                    <h3 style="margin-left: 5px">{{number_format($product->sale_price,0,'','.')}}đ</h3>
                    </div>
                @else
                    <h3>{{number_format($product->regular_price,0,'','.')}}đ</h3>
                @endif 
                @if ($product->stock_status == 'hết hàng')
                    <h4 style="color:red">{{$product->stock_status}}</h4>
                @endif
                @foreach ($product->attributeValues->unique('product_attribute_id') as $av)
                    <div style="margin-top:20px">
                        <div>
                            <h5>{{$av->productAttribute->attribute_name}}</h5>
                        </div>
                        <div >
                            <select style="width:100px" wire:model="satt.{{$av->productAttribute->attribute_name}}">
                                <option value="Select" selected="true">Select</option>
                                @foreach ($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                    <option value="{{$pav->value}}">{{$pav->value}}</option>
                                @endforeach
                            </select>
                            @error('satt') <p style="color:red;font-size:14px">Lựa chọn không phù hợp</p>@enderror
                        </div>
                    </div>
                @endforeach
                @if (Session::has('message'))
                    <p style="color: red;font-size:14px">{{Session::get('message')}}</p>
                @endif

                <h5 style="margin-top:20px">Số lượng</h5>
                <input class="input-cart" type="text" value="0" wire:model="qty">
                <button class="btn-increase" wire:click.prevent="increaseQuantity">+</button>
                <button class="btn-decrease" wire:click.prevent="decreaseQuantity">-</button>
                <br>
                @if ($product->stock_status == "hết hàng")
                    <a class="btn">Thêm vào giỏ</a>
                @elseif ($product->stock_status == "còn hàng")
                    @if ($product->sale_price > 0)
                        <a class="btn" type="submit"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$qty}},{{$product->sale_price}})">Thêm vào giỏ</a>
                    @else
                        <a class="btn" type="submit"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$qty}},{{$product->regular_price}})">Thêm vào giỏ</a>
                    @endif
                @endif
                <h3>Thông tin sản phẩm</h3>
                <p>{{$product->short_description}}</p>
            </div>
        </div>
    </div>
    <h2 class="categories">Sản phẩm tương tự</h2>
            <div class="gallery">
                @foreach ($related_products as $r_products)
                <div class="content">
                    <a href="{{route('product.details',['slug'=>$r_products->slug])}}">
                    <img src="{{asset('assets/images/products')}}/{{$r_products->image}}" class="content-img" alt="{{$r_products->name}}">
                    </a>
                    <a href="{{route('product.details',['slug'=>$r_products->slug])}}">
                    <h3 class="product-brand">{{$r_products->name}}</h3>
                </a>
                <div class="content-price">
                    @if ($r_products->sale_price > 0)
                        
                            <h3 style="text-decoration:2px red line-through;">{{$r_products->regular_price}}đ</h3>
                            <h3>{{$r_products->sale_price}}đ</h3>
                        
                    @else
                        <h3>{{$r_products->regular_price}}đ</span><span class="actual-price"></h3>
                    @endif 
                </div>
                <a class="btn" href="{{route('product.details',['slug'=>$r_products->slug])}}">Buy Now</a>
                </div>
                @endforeach    
            </div>
    <script>
        //Gallery
    var smallimg = document.getElementsByClassName("small-img");

    for(let i = 0; i <= smallimg.length; i++ )
    {
        smallimg[i].onclick = function(){
        productimg.src = smallimg[i].src;
    }};
    </script>
</div>
