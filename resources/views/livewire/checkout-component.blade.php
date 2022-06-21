<div>
<style>
    
    .row {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE10 */
      margin: 0 -16px;
    }
    
    .col-25 {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
    }
    
    .col-50 {
      -ms-flex: 50%; /* IE10 */
      flex: 50%;
    }
    
    .col-75 {
      -ms-flex: 75%; /* IE10 */
      flex: 75%;
    }
    
    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }
    
    .container-checkout {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }
    
    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    label {
      margin-bottom: 10px;
      display: block;
      width: 100%;
    }
    
    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }
    
    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }
    
    .btn:hover {
      background-color: #45a049;
    }
    
    hr {
      border: 1px solid lightgrey;
    }
    
    span.price {
      float: right;
      color: black;
    }
    
    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }
    </style>
<div class="row">
    <div class="col-75">
      <div class="container-checkout">
        <form wire:submit.prevent = "placeOrder">
          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="John M. Doe" wire:model="fullname">
              @error('fullname') <h4 style="color: red">{{$message}}</h4> @enderror

              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="john@example.com" wire:model="email">
              @error('email') <h4 style="color: red">{{$message}}</h4> @enderror

              <label for="mobile"><i class="fa fa-mobile"></i> Mobile</label>
              <input type="text" id="mobile" name="mobile" placeholder="0123456789" wire:model="mobile">
              @error('mobile') <h4 style="color: red">{{$message}}</h4> @enderror

              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" wire:model="line">
              @error('line') <h4 style="color: red">{{$message}}</h4> @enderror

              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="New York" wire:model="city">
              @error('city') <h4 style="color: red">{{$message}}</h4> @enderror
  
              <div class="row">
                <div class="col-50">
                  <label for="country">Country</label>
                  <input type="text" id="country" name="country" placeholder="Viet Nam" wire:model="country">
                  @error('country') <h4 style="color: red">{{$message}}</h4> @enderror
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="10001" wire:model="zipcode">
                  @error('zipcode') <h4 style="color: red">{{$message}}</h4> @enderror
                </div>
              </div>
            </div>
  
            <div class="col-50">
              <h3>Payment</h3>
              <div>
                <label for="cod">
                  <input type="radio" style="width: 20px" id="cod" value="cod" wire:model="paymentmethod">Cash On Delivery
                </label>
                <label for="card">
                  <input type="radio" style="width: 20px" id="card" value="card" wire:model="paymentmethod">Debit / Credit Card
                </label>
                @error('paymentmethod') <h4 style="color: red">{{$message}}</h4> @enderror
                <br>
              </div>
              @if($paymentmethod == 'card')
                <label for="fname">Accepted Cards</label>
                <div>
                  <div class="icon-container">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                  </div>
                  @if (Session::has('stripe_error'))
                      <div style="color: red"> {{Session::get('stripe_error')}}</div>
                  @endif
                  <label for="cname">Name on Card</label>
                  <input type="text" id="cname" name="cardname" placeholder="John More Doe" wire:model="card_name">
                  @error('card_name') <h4 style="color: red">{{$message}}</h4> @enderror

                  <label for="ccnum">Credit card number</label>
                  <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" wire:model="card_no">
                  @error('card_no') <h4 style="color: red">{{$message}}</h4> @enderror

                  <label for="expmonth">Exp Month</label>
                  <input type="text" id="expmonth" name="expmonth" placeholder="September" wire:model="exp_month">
                  @error('exp_month') <h4 style="color: red">{{$message}}</h4> @enderror

                  <div class="row">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <input type="text" id="expyear" name="expyear" placeholder="2018" wire:model="exp_year">
                      @error('exp_year') <h4 style="color: red">{{$message}}</h4> @enderror
                    </div>
                    <div class="col-50">
                      <label for="cvc">CVC</label>
                      <input type="password" id="cvc" name="cvc" placeholder="352" wire:model="cvc">
                      @error('cvc') <h4 style="color: red">{{$message}}</h4> @enderror
                    </div>
                  </div>
              </div>
              @endif
            </div>
            
          </div>
          <input type="submit" value="Continue to checkout" class="btn">
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container-checkout">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{Cart::instance('cart')->count() }}</b></span></h4>
        @if(Session::has('checkout'))
          @foreach (Cart::instance('cart')->content() as $item)
          <p>
            <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" width="60px"> {{$item->model->name}}</a> 
            <div class="content-price">
              @if ($item->model->sale_price > 0)
                
                  <small style="text-decoration:2px red line-through;">{{number_format($item->model->regular_price,0,'','.')}}đ</small>
                  <small>{{number_format($item->model->sale_price,0,'','.')}}đ</small>
                
              @else
                <small>{{number_format($item->model->regular_price,0,'','.')}}đ</small>
              @endif
            </div>
            <span class="price" style="margin-right:20px"> x{{$item->qty}}</span> 
          </p>
          @endforeach
          <p>___________________________________</p>
          <p>Subtotal<span class="price">{{number_format(Cart::instance('cart')->subtotal(),0,'','.')}}đ</span></p>
          @if (Session::get('checkout')['discount'] > 0)
            <p>Discount <span class="price"> - {{number_format(Session::get('checkout')['discount'],0,'','.')}}đ</span></p>
          @endif
          <p>Tax ({{config('cart.tax')}}%) <span class="price"> + {{number_format(Session::get('checkout')['tax'],0,'','.')}}đ</span></p>
          <p>Total <span class="price" style="color:black"><b>{{number_format(Session::get('checkout')['total'],0,'','.')}}đ</b></span></p>
        @endif
      </div>
    </div>
  </div>
</div>