<div>
    @if (count($sproducts) == 0)
    <h3>Hiện chưa có sản phẩm nào đang sale</h3>
      @else
      <h3 style="font-style:italic; padding-top:20px; padding-left:100px"> <i class="fa-solid fa-fire-flame-curved" style="color:red"></i> ON SALE <i class="fa-solid fa-fire-flame-curved" style="color:red"></i></h3>
      <div class="gallery">
        @foreach ($sproducts as $sproduct)
          <div class="content">
              <a href="{{route('product.details',['slug'=>$sproduct->slug])}}">
                <img src="{{asset('assets/images/products')}}/{{$sproduct->image}}" class="content-img"  alt="{{$sproduct->name}}">
              </a>
              <a href="{{route('product.details',['slug'=>$sproduct->slug])}}">
                <h3 class="product-brand">{{$sproduct->name}}</h3>
              </a>
              <div class="content-price">
                <h3 style="text-decoration:2px red line-through;">{{number_format($sproduct->regular_price,0,'','.')}}đ</h3>
                <h3>{{number_format($sproduct->sale_price,0,'','.')}}đ</h3>
              </div>
              <a class="btn" href="{{route('product.details',['slug'=>$sproduct->slug])}}">Buy Now</a>
          </div>
        @endforeach
      </div>
    @endif
    <h3 style="font-style: bold; text-align: center; margin-top:20px">Bạn đã xem hết!</h3>
</div>
