<div>
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="{{asset('assets/images')}}/{{$product->image}}" alt="" width="100%" id="productimg">

            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="{{asset('assets/images')}}/{{$product->image}}" alt=""  width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{asset('assets/images/gallery-2.jpg')}}" alt=""  width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{asset('assets/images/gallery-3.jpg')}}" alt=""  width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{asset('assets/images/gallery-4.jpg')}}" alt=""  width="100%" class="small-img">
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>Home / T-shirt</p>
            <h1>{{$product->name}}</h1>
            <h4>{{$product->regular_price}}</h4>
            <select name="" id="">
                <option value="">Chọn Size</option>
                @foreach ($product_size as $p_size)
                    <option value="">{{$p_size->size}}</option>
                @endforeach
            </select>
            <input class="input-cart" type="text" value="1">
            <a href="" class="btn" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Thêm vào giỏ</a>
            <h3>Thông tin sản phẩm</h3>
            <p>{{$product->short_description}}</p>
        </div>
    </div>
</div>
<div class="product"> 
    <h2 class="categories">Sản phẩm liên quan</h2>
    <div class="product-container">
        @foreach ($related_products as $r_products)
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">{{$r_products->stock_status}}</span>
                <img src= "{{asset('assets/images')}}/{{$r_products->image}}" style="height: 400px" class="product-thumb" alt="{{$product->name}}">
                <a href=""><button class="card-btn" wire:click.prevent="store({{$product->id}},{{$product->name}},{{$product->regular_price}})">Thêm vào giỏ</button></a>
            </div>
            <div class="product-info">
                <h2 class="product-brand">{{$r_products->name}}</h2>
                <p class="product-short-description">{{$r_products->short_description}}</p>
                <span class="price">{{$r_products->regular_price}}</span><span class="actual-price">{{$r_products->sale_price}}</span>
            </div>
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