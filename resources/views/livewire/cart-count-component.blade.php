<div>
    <a href="/cart"><img src="{{asset('assets/images/cart.png')}}" class="cart-icon" id="cart" width="30px" height="30px" name='cart'></a>
    @if (Cart::instance('cart')->count() > 0)
        <span class='badge badge-warning' id='lblCartCount'>{{Cart::instance('cart')->count()}}</span>
    @endif
</div>
