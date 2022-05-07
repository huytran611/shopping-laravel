<div class="container">
    <div class="row">
        <div class="col-2">
            <h1>Hãy sống <br> theo phong cách của bạn</h1>
            <p>Tự hào là doanh nghiệp đứng bét việt nam</p>
            <a href="" class="btn"> Khám phá ngay &#8594;</a>
        </div>
        <div class="col-2">
            <img src=" {{asset('assets/images/home.png')}}" alt="">
        </div>
    </div>
</div>
<!---products-->
<div class="product"> 
    <h2 class="categories">Bán chạy nhất</h2>
    <button class="pre-btn"><img src=" {{asset('assets/images/arrow.png')}}" alt=""></button>
    <button class="nxt-btn"><img src=" {{asset('assets/images/arrow.png')}}" alt=""></button>
    <div class="product-container">
        @foreach ($products as $product)
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">{{$product->stock_status}}</span>
                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                    <img src= "{{asset('assets/images')}}/{{$product->image}}" style="height: 400px" class="product-thumb" alt="{{$product->name}}">
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
<div class="new-product"> 
    <h2 class="categories">Hàng mới về</h2>
    <button class="pre-btn"><img src= "{{asset('assets/images/arrow.png')}}" alt=""></button>
    <button class="nxt-btn"><img src="{{asset('assets/images/arrow.png')}}" alt=""></button>
    <div class="product-container">
        @foreach ($products as $product)
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">{{$product->stock_status}}</span>
                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                    <img src= "{{asset('assets/images')}}/{{$product->image}}" style="height: 400px" class="product-thumb" alt="{{$product->name}}">
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
<!--- offer-->
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="{{asset('assets/images/black-hoodie.jpg')}}" class="offer-img">
            </div>
            <div class="col-2">
                <p>Duy nhất tại Fasion</p>
                <h1>Black Hoodie Supreme</h1>
                <small>Một chiếc áo hoodie cho ngày lạnh giá, không thể 
                    thiếu trong tủ đồ cho dreamer..
                </small>
                <br>
                <a href="" class="btn"> Buy Now</a>
            </div>
        </div>
    </div>
</div>
<!---feedback-->
<div class="feedback">
    <div class="small-container">
        <h2 class="categories">Feedback</h2>
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left">Nhìn sang "chái".. - Messenger</i>
                <p>Sick Feedback</p>

                <img src="{{asset('assets/images/blue-sweater-1.jpg')}}" alt="">
                <h3> Ariana</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left">Áo cho fuckboy hết lấcc - Messenger</i>
                <p>Sick Feedback</p>
                <img src="{{asset('assets/images/red-bomber-supreme.jpg')}}" alt="">
                <h3> Tuấn Cùi</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left">Ăn mặc như cái thằng dở hơi - Messenger</i>
                <p>Sick Feedback</p>
                <img src="{{asset('assets/images/decao.jpg')}}" alt="">
                <h3> Decao</h3>
            </div>
        </div>
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