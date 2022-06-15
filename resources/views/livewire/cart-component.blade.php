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
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><h3>{{$item->model->name}}</h3></a>

                            @foreach ($item->options as $key=>$value)
                                <div style="vertical-align: middle;width:180px;">
                                    <h5><b>{{$key}}:{{$value}}</b></h5>
                                </div>
                            @endforeach
                            
                            @if ($item->model->sale_price > 0)
                                <small style="text-decoration:2px red line-through;">{{number_format($item->model->regular_price,0,'','.')}}đ</small>
                                <small>{{number_format($item->model->sale_price,0,'','.')}}đ</small>
                                </div>
                            @else
                                <small>{{number_format($item->model->regular_price,0,'','.')}}đ</small>
                            @endif 

                        </div>
                    </div>
                </td>
                <td>
                    <input class="input-cart" type="text" value="{{$item->qty}}">
                    <br>
                    <button class="btn-increase" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</button>
                    <button class="btn-decrease" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</button>
                </td>
                @if ($item->model->sale_price > 0)
                    <td style="text-align:center">{{number_format($item->subtotal(),0,'','.')}}đ</td>
                @else
                    <td style="text-align:center">{{number_format($item->subtotal(),0,'','.')}}đ</td>
                @endif
                <td><a href="" style="margin-right:5px" wire:click.prevent="delete('{{$item->rowId}}')"><i class="fa-solid fa-trash" style="font-size:20px"></i></a></td>
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
                <td>{{number_format(Cart::instance('cart')->subtotal(),0,'','.')}}đ</td>
                @if (Session::has('coupon'))
                    <tr>
                        <td>Discount ({{Session::get('coupon')['code']}}) <a href="#" wire:click.prevent="removeCoupon">Xóa</a></td>
                        <td>-{{number_format($discount,0,'','.')}}đ</td>
                    </tr>
                    <tr>
                        <td>Tax ({{config('cart.tax')}}%)</td>
                        <td>{{number_format($taxAfterDiscount,0,'','.')}}đ</td>
                    </tr> 
                    <tr>
                        <td>Tổng tiền với discount ({{config('cart.tax')}}%)</td>
                        <td>{{number_format($subtotalAfterDiscount,0,'','.')}}đ</td>
                    </tr>
                    <tr>
                        <td>Tổng cộng</td>
                        <td>{{number_format($totalAfterDiscount,0,'','.')}}đ</td>
                    </tr>
                @else
                    <tr>
                        <td>Thuế</td>
                        <td>{{number_format(Cart::instance('cart')->tax(),0,'','.')}}đ</td>
                    </tr>
                    <tr>
                        <td>Tổng cộng</td>
                        <td>{{number_format(Cart::instance('cart')->total(),0,'','.')}}đ</td>
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
