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
        @if(Cart::count() > 0)
            @foreach (Cart::content() as $item)
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{asset('assets/images')}}/{{$item->model->image}}" alt="{{$item->model->name}}">
                        <div>
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><p>${{$item->model->name}}</p></a>
                            <small>{{$item->model->regular_price}}</small>
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
                <td>{{$item->subtotal}}</td>

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
                <td>${{Cart::subtotal()}}</td>
            </tr>
            <tr>
                <td>Thuế</td>
                <td>${{Cart::tax()}}</td>
            </tr>
            <tr>
                <td>Tổng cộng</td>
                <td>${{Cart::total()}}</td>
            </tr>
        </table>
    </div>
</div>
