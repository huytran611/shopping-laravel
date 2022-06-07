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
    <script src="https://kit.fontawesome.com/7a0f399409.js" crossorigin="anonymous"></script>
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
                            <a class="dropbtn">SẢN PHẨM <i class="fa-solid fa-caret-down"></i></a>                                
                            <div class="dropdown-content-header" >
                              <a href="/news">All Products</a>
                              <a href="/product-category/tshirt">Tshirt</a>
                              <a href="/product-category/shirt">Shirt</a>
                              <a href="/product-category/jacket">Jacket</a>
                              <a href="/product-category/sweater">Sweater</a>
                              <a href="/product-category/pants">Pants</a>
                              <a href="/product-category/shorts">Shorts</a>
                            </div>
                          </div>
                    </li>
                    <li><a href="/sale">SALE</a></li>
                    <li><a href="/shoes">SHOES</a></li>
                    <li><a href="/accessories">PHỤ KIỆN</a></li>
                </ul>
            </nav>
            
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype === 'ADM')
                    <div class="dropdown">
                        <a href="" style="padding-right: 10px; color:#CD5C5C">{{Auth::user()->name}}</a>
                        <div class="dropdown-user">
                            <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            <a href="{{route('admin.categories')}}" title="Categories">Categories</a>
                            <a href="{{route('admin.products')}}" title="Products">All Products</a>
                            <a href="{{route('admin.homeslider')}}" title="Home Slider">Manage Home Slider</a>
                            <a href="{{route('admin.coupons')}}" title="All Coupons">All Coupons</a>
                            <a href="{{route('admin.orders')}}" title="All Orders">All Orders</a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                        </div>
                      </div>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                            @csrf
                        </form>
                    @else
                        
                    <div class="dropdown">
                        <a href="" style="padding-right: 10px; color:#CD5C5C">{{Auth::user()->name}}</a>
                        <div class="dropdown-user">
                            <a title="Dash Board" href="{{route('user.dashboard')}}">Dashboard</a>
                            <a title="My Orders" href="{{route('user.orders')}}">My Orders</a>
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
            
            @livewire('header-search-component')
            @livewire('cart-count-component')
            <img src="{{asset('assets/images/menu.png')}}" class="menu-icon" alt=""
            onclick="menutoggle()">
        </div>
    </div>
       
    
{{-- for ->layout('homepage.index')--}}

    {{$slot}}



    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-2">
                    <img src="{{asset('assets/images/logo.png')}}" alt="">
                    <p>Fashion with out H</p>
                </div>
                <table class="table">
                    <tr>
                        <th>
                            <div class="footer-col-3">
                                <h3>Useful Links</h3>
                                <ul>
                                    <li>Coupons</li>
                                    <li>Blog Post</li>
                                    <li>Return Policy</li>
                                    <li>Join Affiliate</li>
                                </ul>
                            </div>
                        </th>
                        <th>
                            <div class="footer-product-card">
                                <h3>Folow Us</h3>
                                <ul>
                                    <li>Faxebook</li>
                                    <li>Instagram</li>
                                    <li>Telegram</li>
                                    <li>HEHE</li>
                                </ul>
                            </div>
                        </th>
                    </tr>
                </table>
                
                
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - by Huy Tran </p>
        </div>
    </div> 
 @livewireScripts
<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js')}}"></script>
<script src="{{ asset('assets/js/functions.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>

</body>
</html>