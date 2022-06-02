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
                <input type="radio" id="cod" name="fav_language" value="cod" wire:model="paymentmethod">
                <label for="cod">COD</label><br>
                <input type="radio" id="card" name="fav_language" value="card" wire:model="paymentmethod">
                <label for="card">Card</label><br>
                @error('paymentmethod') <h4 style="color: red">{{$message}}</h4> @enderror
              </div>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="John More Doe">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September">
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
              </div>
            </div>
            
          </div>
          <input type="submit" value="Continue to checkout" class="btn">
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container-checkout">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{Cart::instance('cart')->count() }}</b></span></h4>
        
        @foreach (Cart::instance('cart')->content() as $item)
        <p><a href="{{route('product.details',['slug'=>$item->model->slug])}}"><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" width="60px"> {{$item->model->name}}</a> <span class="price">{{$item->model->regular_price}}đ</span></p>
        @endforeach
        <p>___________________________________</p>
        <p>Total <span class="price" style="color:black"><b>{{Cart::instance('cart')->subtotal()}}đ</b></span></p>
      </div>
    </div>
  </div>
</div>