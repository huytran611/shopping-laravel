<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p>Chào {{$order->fullname}}</p>
    <p>Đơn hàng của bạn đã được đặt thành công.</p>
    <br>
    <table style="width: 600px; text-align:right">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetails as $item)
                <tr>
                    <td><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" width="100"></td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->detail_quantity}}</td>
                    <td>{{number_format($item->detail_price * $item->detail_quantity,0,'','.')}}đ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="border-top:1px solid #ccc;"></td>
                <td style="font-size: 15px; font-weight:bold;border-top:1px solid #ccc;">Subtotal: {{number_format($order->subtotal,0,'','.')}}đ</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold">Tax: {{number_format($order->tax,0,'','.')}}đ</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 15px; font-weight:bold">Shipping: Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size: 22px; font-weight:bold">Total: {{number_format($order->total,0,'','.')}}đ</td>
            </tr>
        </tbody>
    </table>
</body>
</html>