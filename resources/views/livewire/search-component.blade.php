<div>
    <div class="container">
        <div >
        <h4 style="padding-top:50px">
            Kết quả cho từ khóa: "{{$search}}"
        </h4>
        </div>
        <nav class="product-filter">
          
            <div class="sort">
          
              <div class="collection-sort">
                <h4 >Sắp xếp theo:</h4>
                <select wire:model="sorting" style="width:150px;">
                    <option value="default" selected="selected">Mặc định</option>
                    <option value="date">Mới nhất</option>
                    <option value="price">Giá: thấp -> cao</option>
                    <option value="price-desc">Giá: cao -> thấp</option>
                </select>
              </div>
          
            </div>
          
        </nav>
        @if($products->count() > 0)
        <div class="gallery">
            @foreach ($products as $product)
            <div class="content">
                  <a href="{{route('product.details',['slug'=>$product->slug])}}">
                    <img src="{{asset('assets/images/products')}}/{{$product->image}}" class="content-img" alt="{{$product->name}}">
                  </a>
                  <a href="{{route('product.details',['slug'=>$product->slug])}}">
                    <h3 class="product-brand">{{$product->name}}</h3>
                </a>
                <div class="content-price">
                @if ($product->sale_price > 0)
                    <h3 style="text-decoration:2px red line-through;">{{number_format($product->regular_price,0,'','.')}}đ</h3>
                    <h3>{{number_format($product->sale_price,0,'','.')}}đ</h3>
                    
                @else
                    <h3>{{number_format($product->regular_price,0,'','.')}}đ</h3>
                @endif
                  </div>
                  <a class="btn" href="{{route('product.details',['slug'=>$product->slug])}}">Buy Now</a>
            </div>
            @endforeach
        </div>
        @else 
            <p style="padding:100px;text-align:center">Không tồn tại sản phẩm</p>
        @endif
    </div>
</div>