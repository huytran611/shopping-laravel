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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @livewireStyles 
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a href="/"><img src="{{asset('assets/images/logo.png')}}" alt="" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="/">HOME</a></li>
                    <li><a href="/news">SẢN PHẨM MỚI</a></li>
                    <li><a href="/men">NAM</a></li>
                    
                    <li><a href="/women">NỮ</a></li>
                    <li><a href="/kid">TRẺ EM</a></li>
                    <li><a href="/accessories">PHỤ KIỆN</a></li>
                </ul>
            </nav>
            <div class="searchbar">
                <input type="text" placeholder="Tìm kiếm..">
            </div>
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype === 'ADM')
                    <div class="dropdown">
                        <a href="" style="padding-right: 10px; color:#ff523b">{{Auth::user()->name}}</a>
                        <div class="dropdown-content">
                            <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                        </div>
                      </div>
                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                            @csrf
                        </form>
                    @else
                        
                    <div class="dropdown">
                        <a href="" style="padding-right: 10px; color:#ff523b">{{Auth::user()->name}}</a>
                        <div class="dropdown-content">
                            <a href="{{route('user.dashboard')}}">Dashboard</a>
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
            <a href="/cart"><img src="{{asset('assets/images/cart.png')}}" class="cart-icon" id="cart" width="30px" height="30px"><span class="badge">3</span></a>
            <img src="{{asset('assets/images/menu.png')}}" class="menu-icon" alt=""
            onclick="menutoggle()">
            

        </div>
    </div>
    {{$slot}}
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App deee</p>
                </div>
                <div class="footer-col-2">
                    <img src="{{asset('assets/images/logo.png')}}" alt="">
                    <p>Download App deee</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-product-card">
                    <h3>Folow Us</h3>
                    <ul>
                        <li>Faxebook</li>
                        <li>Instagram</li>
                        <li>Telegram</li>
                        <li>HEHE</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - by Huy Tran </p>
        </div>
    </div>
<script>
    var MenuItems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = "0px";

function menutoggle(){
    if(MenuItems.style.maxHeight == "0px")
    {
        MenuItems.style.maxHeight = "200px";
    }
    else{
        MenuItems.style.maxHeight = "0px";
    }
}
</script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>
@livewireScripts
</body>
</html>