<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasion Store | Trang Chủ</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;500;600&family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">   
    @livewireStyles 

</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a href="/"><img src="{{asset('assets/images/logo.png')}}" alt="" width="90px"></a>
            </div>
            <nav>
                <ul id="MenuItems" >
                    <li><a href="/">HOME</a></li>
                    <li>
                        <div class="dropdown">
                            <a class="dropbtn" href="/news">SẢN PHẨM</button>
                            <div class="dropdown-content-header">
                              <a href="/product-category/fugit-qui">Link 1</a>
                              <a href="/product-category/est-dicta">Áo</a>
                              <a href="#">Link 2</a>
                              <a href="#">Link 3</a>
                            </div>
                          </div>
                    </li>
                    <li><a href="">SALE</a></li>
                    <li><a href="">SNEAKER</a></li>
                    <li><a href="/accessories">PHỤ KIỆN</a></li>
                </ul>
            </nav>
            @livewire('header-search-component')
            <a href="/cart"><img src="{{asset('assets/images/cart.png')}}" class="cart-icon" id="cart" width="30px" height="30px"></a>
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype === 'ADM')
                    <div class="dropdown">
                        <a href="" style="padding-right: 10px; color:#ff523b">{{Auth::user()->name}}</a>
                        <div class="dropdown-user">
                            <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            <br>
                            <br>
                            <a href="{{route('admin.categories')}}" title="Categories">Categories</a>
                            <br>
                            <br>
                            <a href="{{route('admin.products')}}" title="Products">All Products</a>
                            <br>
                            <br>
                            <a href="{{route('admin.homeslider')}}" title="Home Slider">Manage Home Slider</a>
                            <br>
                            <br>
                            <a href="{{route('admin.coupons')}}" title="All Coupons">All Coupons</a>
                            <br>
                            <br>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                        </div>
                      </div>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                            @csrf
                        </form>
                    @else
                        
                    <div class="dropdown">
                        <a href="" style="padding-right: 10px; color:#ff523b">{{Auth::user()->name}}</a>
                        <div class="dropdown-user">
                            <a href="{{route('user.dashboard')}}">Dashboard</a>
                            <br>
                            <br>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                        </div>
                      </div>
                         
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                            @csrf
                            
                        </form>
                    @endif
                @else
                <a href="{{route('login')}}"><img src="{{asset('assets/images/user-icon.png')}}" style="height:30px; margin-top:5px;"alt=""></a>
                @endif
            @endif
            
            <img src="{{asset('assets/images/menu.png')}}" class="menu-icon" alt=""
            onclick="menutoggle()">
        </div>
    </div>
       
    
{{-- for ->layout('homepage.index')--}}

    {{$slot}}


 
<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js')}}"></script>
<script src="{{ asset('assets/js/functions.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>>
@livewireScripts
</body>
</html>