<div class="container">
    <h2 style="margin-left:100px; font-style:italic;">{{$category_name}}</h2>
          <nav class="product-filter">
              <div class="sort">
                <div class="collection-sort">
                  <h4 >Sắp xếp theo:</h4>
                  <select wire:model="sorting" class="select-orderby">
                      <option value="default" selected="selected">Mặc định</option>
                      <option value="date">Mới nhất</option>
                      <option value="price">Giá: thấp -> cao</option>
                      <option value="price-desc">Giá: cao -> thấp</option>
                  </select>
                </div>
              </div>
            
          </nav>
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
                        <h3 style="margin-left: 5px">{{number_format($product->sale_price,0,'','.')}}đ</h3>
                      
                      @else
                      <h3>{{number_format($product->regular_price,0,'','.')}}đ</span><span class="actual-price"></h3>
                      @endif  
                    </div>
                    <a class="btn" href="{{route('product.details',['slug'=>$product->slug])}}">Buy Now</a>
                  </div>
              @endforeach
          </div>
          <h3 style="font-style: bold; text-align: center">Bạn đã xem hết!</h3>
  </div>
  