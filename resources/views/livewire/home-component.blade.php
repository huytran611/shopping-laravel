<div>
  <!--Slider-->
  <div class="slideshow-container">

    @foreach ($sliders as $slide)
      <div class="mySlides fade">
        <a href="{{$slide->link}}"><img src="{{asset('assets/images/sliders')}}/{{$slide->image}}"width="100%"></a>
        <div class="text" >{{$slide->title}}</div>
      </div>
    @endforeach

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
  </div>

  <!--Sale Slider-->
  <div class="slider" id="slider">
    @if (count($sproducts) == 0)
    @else
    <img src="{{asset('assets/images/sale.png')}}" width="150" alt="">
    <div class="slide" id="slide">
      @foreach ($sproducts as $sproduct)
      <div class="content">
          <a href="{{route('product.details',['slug'=>$sproduct->slug])}}">
            <img src="{{asset('assets/images/products')}}/{{$sproduct->image}}" style="height: 400px; width:300px"  alt="{{$sproduct->name}}">
          </a>
          <a href="{{route('product.details',['slug'=>$sproduct->slug])}}">
            <h3 class="product-brand">{{$sproduct->name}}</h3>
          </a>
        <h3 class="strikethrough">{{$sproduct->regular_price}}đ</h3><span><h3>{{$sproduct->sale_price}}</h3></span>
        <button class="buy-1" wire:click.prevent="store({{$sproduct->id}},'{{$sproduct->name}}',{{$sproduct->regular_price}})">Buy Now</button>
      </div>
    @endforeach
    </div>
    <a class="ctrl-btn pro-next">❯</a>
    <a class="ctrl-btn pro-prev">❮</a>
  
  @endif
  </div>

  <!--Products List-->
  <h3 style="font-style:italic; padding-top:20px; padding-left:100px">NEWEST PRODUCTS</h3>
  <div class="gallery">
  @foreach ($lproducts as $lproduct)
    <div class="content">
        <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">
          <img src="{{asset('assets/images/products')}}/{{$lproduct->image}}" style="height: 400px; width:300px"  alt="{{$lproduct->name}}">
        </a>
        <a href="{{route('product.details',['slug'=>$lproduct->slug])}}">
          <h3 class="product-brand">{{$lproduct->name}}</h3>
        </a>
      <h3>{{$lproduct->regular_price}}đ</h3>
      <button class="buy-1" wire:click.prevent="store({{$lproduct->id}},'{{$lproduct->name}}',{{$lproduct->regular_price}})">Buy Now</button>
    </div>
  @endforeach
  
  </div>
  <a href="/news"><h3 style="text-align: center; font-style:italic;margin-bottom:70px;margin-top:20px">Xem thêm sản phẩm -></h3></a>
  <div class="section">
    <div class="row">
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://www.adidas.com/us" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/151792556147.jpg">
        </a>
      </div>
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://www.apple.com/" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/Apple-logo1.jpg">
        </a>
      </div>
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://amazon.com/" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/hidden_meanings_facts_within_famous_logos_cover_image.jpg">
        </a>
      </div>
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://www.beatsbydre.com/" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/558390-11FO8A1505384509.png">
        </a>
      </div>
    </div>
    <div class="row">
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://www.beatsbydre.com/" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/558390-11FO8A1505384509.png">
        </a>
      </div>
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://amazon.com/" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/hidden_meanings_facts_within_famous_logos_cover_image.jpg">
        </a>
      </div>
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://apple.com/" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/Apple-logo1.jpg">
        </a>
      </div>
      <div class="logo-wrapper col-12 col-sm-3 col-md-3">
        <a href="https://www.adidas.com/us" target="_blank">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/827904/151792556147.jpg">
        </a>
      </div>
    </div>
  </div>

  <script>
    
  //Sale Slider
    productScroll();

  function productScroll() {
    let slider = document.getElementById("slider");
    let next = document.getElementsByClassName("pro-next");
    let prev = document.getElementsByClassName("pro-prev");
    let slide = document.getElementById("slide");
    let item = document.getElementById("slide");

    for (let i = 0; i < next.length; i++) {
      //refer elements by class name

      let position = 0; //slider postion

      prev[i].addEventListener("click", function() {
        //click previos button
        if (position > 0) {
          //avoid slide left beyond the first item
          position -= 1;
          translateX(position); //translate items
        }
      });

      next[i].addEventListener("click", function() {
        if (position >= 0 && position < hiddenItems()) {
          //avoid slide right beyond the last item
          position += 1;
          translateX(position); //translate items
        }
      });
    }

    function hiddenItems() {
      //get hidden items
      let items = getCount(item, false);
      let visibleItems = slider.offsetWidth / 210;
      return items - Math.ceil(visibleItems);
    }
  }

  function translateX(position) {
    //translate items
    slide.style.left = position * -210 + "px";
  }

  function getCount(parent, getChildrensChildren) {
    //count no of items
    let relevantChildren = 0;
    let children = parent.childNodes.length;
    for (let i = 0; i < children; i++) {
      if (parent.childNodes[i].nodeType != 3) {
        if (getChildrensChildren)
          relevantChildren += getCount(parent.childNodes[i], true);
        relevantChildren++;
      }
    }
    return relevantChildren;
  }

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