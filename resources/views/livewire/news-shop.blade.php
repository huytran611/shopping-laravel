<div class="container">
  <div class="topnav">
    <a href="/news" class="atag active">Tất cả</a>
    @foreach ($categories as $item)
        <a class="atag" href="/product-category/{{$item->slug}}">{{$item->name}}</a>
    @endforeach
  </div>
        <nav class="product-filter">
          
            <div class="sort">
          
              <div class="collection-sort">
                <h4 >Sắp xếp theo:</h4>
                <select wire:model="sorting" style="width:150px; height:50px; font-size: 16px; font-style:italic">
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
                    <img src="{{asset('assets/images')}}/{{$product->image}}" style="height: 400px;" alt="{{$product->name}}">
                  </a>
                  <a href="{{route('product.details',['slug'=>$product->slug])}}">
                    <h3 class="product-brand">{{$product->name}}</h3>
                </a>
                <h3>${{$product->regular_price}}</span><span class="actual-price">{{$product->sale_price}}</span></h3>
                <button class="buy-1" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Buy Now</button>
            </div>
            @endforeach
        </div>
        <h3 style="font-style: bold; text-align: center; margin-top:20px">Bạn đã xem hết!</h3>
</div>