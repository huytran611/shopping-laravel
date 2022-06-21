<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ordered Details
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}" class="btn btn-success pull-right">My Orders</a>
                                @if ($order->status == 'ordered')
                                    <a href="#" class="btn btn-warning pull-right" wire:click.prevent = "cancelOrder" style="margin-right: 10px">Cancel Order</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <th>Order ID</th>
                            <td>{{$order->id}}</td>
                            <th>Order Date</th>
                            <td>{{$order->created_at}}</td>
                            <th>Status</th>
                            <td>{{$order->status}}</td>
                            @if($order->status == 'delivered')
                            <th>Delivery Date</th>
                            <td>{{$order->delivered_date}}</td>
                            @elseif($order->status = 'canceled')
                            <th>Canceled Date</th>
                            <td>{{$order->canceled_date}}</td>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ordered Items
                    </div>
                    <div class="panel-body">
                        <div class="small-container cart-page">
                            <table>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                                    @foreach ($order->orderdetails as $item)
                                    <tr>
                                        <td>
                                            <div class="cart-info">
                                                <img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}">
                                                <div>
                                                    <a href="{{route('product.details',['slug'=>$item->product->slug])}}"><p>{{$item->product->name}}</p></a>
                                                    @if ($item->options)
                                                        <div>
                                                            @foreach (unserialize($item->options) as $key=>$value)
                                                                <p><b>{{$key}}:{{$value}}</b></p>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <small>{{$item->product->regular_price}}đ</small>
                                                    <br>
                                                    <a href="" wire:click.prevent="delete('{{$item->rowId}}')">Xóa</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{$item->detail_quantity}}</h5>
                                        </td>
                                        
                                        <td>{{$item->product->regular_price * $item->detail_quantity}}đ</td>                     
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal: </span><b class="index">{{$order->subtotal}}đ</b></p>
                                <p class="summary-info"><span class="title">Tax: </span><b class="index">{{$order->tax}}đ</b></p>
                                <p class="summary-info"><span class="title">Shipping: </span><b class="index">Free Shipping</b></p>
                                <p class="summary-info"><span class="title">Total: </span><b class="index">{{$order->total}}đ</b></p>

                            </div>
                        </div>
                    </div>
                </div>
             </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Billing Detail
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Full Name</th>
                                <td>{{$order->fullname}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$order->mobile}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>Line</th>
                                <td>{{$order->line1}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$order->city}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$order->country}}</td>
                            </tr>
                            <tr>
                                <th>Zipcode</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
