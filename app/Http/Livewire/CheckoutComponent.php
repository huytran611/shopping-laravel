<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    public $fullname;
    public $email;
    public $mobile;
    public $line;
    public $city;
    public $country;
    public $zipcode;

    public $paymentmethod;
    public $thankyou;

    public $card_name;
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'fullname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmethod' => 'required'
        ]);

        if($this->paymentmethod == 'card')
        {
            $this->validateOnly($fields,[
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric'
            ]);
        }

    }

    public function placeOrder()
    {
        $this->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmethod' => 'required'
        ]);

        if($this->paymentmethod == 'card')
        {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric'
            ]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->fullname = $this-> fullname;
        $order->email = $this-> email;
        $order->mobile = $this-> mobile;
        $order->line1 = $this-> line;
        $order->city = $this->city;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $item->id;
            $orderDetail->order_id = $order->id;
            $orderDetail->detail_price = $item->price;
            $orderDetail->detail_quantity = $item->qty;
            if($item->options)
            {
                $orderDetail->options = serialize($item->options);
            }
            $orderDetail->save();
        }

        if($this->paymentmethod == 'cod')
        {
            $this->makeTransaction($order->id,'pending');
            $this->resetCart();
        }
        else if($this->paymentmethod == 'card')
        {
            $stripe = Stripe::make(env('STRIPE_KEY'));

            try{
                $token = $stripe->tokens()->create([
                    'card' => [
                        'name' => $this->card_name,
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);
                if(!isset($token['id']))
                {
                    session()->flash('stripe_error', 'The stripe token was not generated correctly');
                    $this->thankyou = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->fullname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'country' => $this->country
                    ],
                    'shipping' => [
                        'name' => $this->fullname,
                        'address' => [
                            'line1' => $this->line,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'country' => $this->country
                        ],
                    ],
                    'source' => $token['id']
                ]);
                
                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'VND',
                    'amount' => floor(session()->get('checkout')['total']),
                    'description' => 'Payment for order no' . $order->id
                ]);

                if($charge['status'] == 'succeeded')
                {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                }
                else
                {
                    session()->flash('stripe_error','Error in Transaction');
                    $this->thankyou = 0;
                }
            } catch (Exception $e)
            {
                session()->flash('stripe_error',$e->getMessage());
                $this->thankyou = 0;
            }

        }
        $this->sendOrderConfirmationMail($order);
        
    }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id,$status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmethod;
        $transaction->status = $status;
        $transaction->save();
    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('homepage.index');
    }
}
