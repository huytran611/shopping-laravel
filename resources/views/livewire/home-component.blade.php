<div>
  <div class="slideshow-container">
      
    <div class="mySlides fade">
      <img src="{{asset('assets/images/banner.jpg')}}"width="100%">
      <div class="text" >"Lorem ipsum dolor sit""</div>
    </div>
    <div class="mySlides fade">
      <img src="{{asset('assets/images/slider-2.jpg')}}"width="100%">
      <div class="text" >"Lorem ipsum dolor sit"</div>
    </div>
    <div class="mySlides fade">
      <img src="{{asset('assets/images/slider-1.jpg')}}"width="100%">
      <div class="text" >"Lorem ipsum dolor sit"</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
  </div>
  <br>

  <div style="text-align:center;">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  </div> 
  <!--Products List-->
  <h3 style="font-style:italic; padding-top:20px; padding-left:100px">NEWEST PRODUCTS</h3>
  <div class="gallery">
  @foreach ($products as $product)
    <div class="content">
        <a href="{{route('product.details',['slug'=>$product->slug])}}">
          <img src="{{asset('assets/images')}}/{{$product->image}}" style="height: 400px"  alt="{{$product->name}}">
        </a>
        <a href="{{route('product.details',['slug'=>$product->slug])}}">
          <h3 class="product-brand">{{$product->name}}</h3>
        </a>
      <h3>${{$product->regular_price}}</span><span class="actual-price">{{$product->sale_price}}</span></h3>
      <button class="buy-1" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Buy Now</button>
    </div>
  @endforeach
  
  </div>
  <a href="/news"><h3 style="text-align: center; font-style:italic;margin-bottom:70px;margin-top:20px">Xem thêm sản phẩm -></h3></a>

  <!---brand-->
  <div class="small-container">
    <section class="customer-logos slider">
      <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
      <div class="slide"><img src="{{asset('assets/images/nike-logo.png')}}"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
      <div class="slide"><img src="{{asset('assets/images/vans-logo.png')}}"></div>
    </section>
  </div>
  <script>
    //Image Slider
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }


    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
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
    }
  </script>
</div