<!-- Thẻ Chứa Slideshow -->
<div class="slideshow-container">
    <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->
     <div class="mySlides fade">
       <div class="numbertext">1 / 3</div>
       <img src="{{asset('assets/images/skate.jpg')}}" style="width:100%" height="100%">
       <div class="text">Nội Dung 1</div>
     </div>
    <div class="mySlides fade">
       <div class="numbertext">2 / 3</div>
       <img src="{{asset('assets/images/kendall-jenner.jpg')}}" style="width:100%" height="100%">
       <div class="text">Nội Dung 2</div>
     </div>
    <div class="mySlides fade">
       <div class="numbertext">3 / 3</div>
       <img src="https://images.pexels.com/photos/2582546/pexels-photo-2582546.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" style="width:100%" height="100%">
       <div class="text">Nội Dung 3</div>
     </div>
    <!-- Nút điều khiển mũi tên-->
     <a class="prev" onclick="plusSlides(-1)">❮</a>
     <a class="next" onclick="plusSlides(1)">❯</a>
   </div>
   <br>
  <!-- Nút tròn điều khiển slideshow-->
   <div style="text-align:center">
     <span class="dot" onclick="currentSlide(1)"></span>
     <span class="dot" onclick="currentSlide(2)"></span>
     <span class="dot" onclick="currentSlide(3)"></span>
   </div>
</div> 
<div class="new-product"> 
    <h2 class="categories">Hàng mới về</h2>
    <div class="product-container">
        @foreach ($products as $product)
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">{{$product->stock_status}}</span>
                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                    <img src= "{{asset('assets/images/skate.jpg')}}" width="100%" class="product-thumb" alt="{{$product->name}}">
                </a>
                <button class="card-btn">Thêm vào giỏ</button>
            </div>
            <div class="product-info">
                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                    <h2 class="product-brand">{{$product->name}}</h2>
                </a>
                <p class="product-short-description">{{$product->short_description}}</p>
                <span class="price">{{$product->regular_price}}</span><span class="actual-price">{{$product->sale_price}}</span>
            </div>
        </div>
        @endforeach    
    </div>
</div>
<!---brand-->
<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="{{asset('assets/images/logo-coca-cola.png')}}" alt="">
            </div>
            <div class="col-5">
                <img src="{{asset('assets/images/logo-paypal.png')}}" alt="">
            </div>
            <div class="col-5">
                <img src="{{asset('assets/images/logo-oppo.png')}}" alt="">
            </div>
            <div class="col-5">
                <img src="{{asset('assets/images/logo-coca-cola.png')}}" alt="">
            </div>
        </div>
    </div>
</div>