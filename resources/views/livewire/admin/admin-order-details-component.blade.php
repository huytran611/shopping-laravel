<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <div class="container" style="padding: 30px 0">
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
                                                                                                <div>
                                                    <small>{{$item->price}}đ</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>{{$item->quantity}}</h5>
                                        </td>
                                        
                                        <td>{{$item->price * $item->quantity}}đ</td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{$order->subtotal}}đ</b></p>
                                <p class="summary-info"><span class="title">Tax</span><b class="index">{{$order->tax}}đ</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">{{$order->total}}đ</b></p>

                            </div>
                        </div>
                    </div>
                </div>
             </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Billing Items
                    </div>
                    <div class="panel-body">
                        
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
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shopping Details
                    </div>
                    <div class="panel-body">
                        
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
