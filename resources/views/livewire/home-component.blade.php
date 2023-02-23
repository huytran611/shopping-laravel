<div>
  <!--Slider-->
  <div class="slideshow-container">
    @foreach ($sliders as $slide)
    <div class="mySlides fade">
      <a href="{{$slide->link}}"><img src="{{asset('assets/images/sliders')}}/{{$slide->image}}"width="100%"></a>
      <div class="text" >{{$slide->title}}</div>
    </div>
  @endforeach
  <br>

  <div style="text-align:center">
  </div>  
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
  </div>


  
  <!--Sale-->
  @if (count($sproducts) == 0)
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
  <a href="/sale"><h3 style="text-align: center; font-style:italic;margin-bottom:70px;margin-top:20px">Xem thêm sản phẩm <i class="fa-solid fa-arrow-right"></i></h3></a>
  <!--Products List-->
  <h3 style="font-style:italic; padding-top:20px; padding-left:100px">NEWEST PRODUCTS</h3>
  <div class="gallery">
  @foreach ($lproducts as $lproduct)
    <div class="content">
        <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">
          <img src="{{asset('assets/images/products')}}/{{$lproduct->image}}" class="content-img"  alt="{{$lproduct->name}}">
        </a>
        <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">
          <h3 class="product-brand">{{$lproduct->name}}</h3>
        </a>
        <div class="content-price">
          @if ($lproduct->sale_price > 0)
            
              <h3 style="text-decoration:2px red line-through;">{{number_format($lproduct->regular_price,0,'','.')}}đ</h3>
              <h3>{{number_format($lproduct->sale_price,0,'','.')}}đ</h3>
            
          @else
            <h3>{{number_format($lproduct->regular_price,0,'','.')}}đ</h3>
          @endif
        </div>
      <a class="btn" href="{{route('product.details',['slug'=>$lproduct->slug])}}">Buy Now</a>
    </div>
  @endforeach
  </div>
  <a href="/news"><h3 style="text-align: center; font-style:italic;margin-bottom:70px;margin-top:20px">Xem thêm sản phẩm <i class="fa-solid fa-arrow-right"></i></h3></a>
  <script> 
  let slideIndex = 1;
  showSlides(slideIndex);
  function plusSlides(n) {
    showSlides(slideIndex += n);
  } 

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  };
  </script>
</div