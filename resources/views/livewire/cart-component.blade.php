<div class="small-container cart-page">
    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </tr>
        @if(Session::has('success_message'))
            
                <strong>Success</strong>{{Session::get('success_message')}}
            
        @endif
        @if(Cart::instance('cart')->count() > 0)
            @foreach (Cart::instance('cart')->content() as $item)
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}">
                        <div>
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><p>{{$item->model->name}}</p></a>
                            <small>{{$item->model->regular_price}}đ</small>
                            <br>
                            <a href="" wire:click.prevent="delete('{{$item->rowId}}')">Xóa</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input class="input-cart" type="text" value="{{$item->qty}}">
                    <br>
                    <button class="btn-increase" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</button>
                    <button class="btn-decrease" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</button>
                </td>
                
                <td>{{$item->subtotal}}đ</td>

            </tr>
            @endforeach
        @else
            <p>Giỏ hàng trống</p>
        @endif
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Tổng</td>
                <td>{{Cart::instance('cart')->subtotal()}}đ</td>
                @if (Session::has('coupon'))
                    <tr>
                        <td>Discount ({{Session::get('coupon')['code']}}) <a href="#" wire:click.prevent="removeCoupon">Xóa</a></td>
                        <td>-{{number_format($discount,2)}}đ</td>
                    </tr>
                    <tr>
                        <td>Tax ({{config('cart.tax')}}%)</td>
                        <td>{{number_format($taxAfterDiscount,2)}}đ</td>
                    </tr> 
                    <tr>
                        <td>Tổng tiền với discount ({{config('cart.tax')}}%)</td>
                        <td>{{number_format($subtotalAfterDiscount,2)}}đ</td>
                    </tr>
                    <tr>
                        <td>Tổng cộng</td>
                        <td>{{number_format($totalAfterDiscount,2)}}đ</td>
                    </tr>
                @else
                    <tr>
                        <td>Thuế</td>
                        <td>{{Cart::instance('cart')->tax()}}đ</td>
                    </tr>
                    <tr>
                        <td>Tổng cộng</td>
                        <td>{{Cart::instance('cart')->total()}}đ</td>
                    </tr>
                @endif
            </tr>
            
        </table>
    </div>
    @if (!Session::has('coupon'))
        <div class="checkout-info">
            <label> 
                <input type="checkbox" style="width: 20px" wire:model = "haveCouponCode" value="1"> I have coupon code
            </label>
            @if($haveCouponCode == 1)
                <div class="summary-item">
                    <form wire:submit.prevent = "applyCouponCode">
                        <h4> Coupon Code</h4>
                        @if(Session::has('coupon_message'))
                            <div role="danger">{{Session::get('coupon_message')}}</div>
                        @endif
                        <p>
                            <label for="coupon-code">Enter you coupon code: </label>
                            <input type="text" name="coupon-code" wire:model="couponCode">
                        </p>
                        <button type="submit">Apply</button>
                    </form>
                </div>
            @endif
        @endif
        <br>
        <a href="#" wire:click.prevent="checkout">Check out</a>
        <br>
        @if (Session::has('checkout_message'))
                <h3 style="text-align: center">{{Session::get('checkout_message')}}</h3>
        @endif
        
    </div>
</div>
