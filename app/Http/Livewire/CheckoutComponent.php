<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;

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
            $orderDetail->detail_product_id = $item->id;
            $orderDetail->detail_order_id = $order->id;
            $orderDetail->detail_price = $item->price;
            $orderDetail->detail_quantity = $item->qty;
            $orderDetail->save();
        }

        if($this->paymentmethod == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

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
