<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderBook;
use Cart;

class CheckoutController extends Controller
{
	public function checkout() 
    {
        $cart = Cart::content();

        return view('checkout', compact('cart'));
    }

    public function payment(Request $request)
    {
        $name = $request->txt_ten_kh;
        $email =  $request->txt_email_kh;
        $address = $request->txt_dia_chi_kh;
        $phone = $request->txt_sdt_kh;
        $description = $request->txt_ghi_chu;

        $accout = User::userSearch('email', $email)->get()->first();
        $user = $accout;
        if(!$accout) {
            $user = User::create([
                'name' => $name,
                'username' => 'huyenlanh',
                'email' => $email,
                'password' => 'huyenlanh',
                'date_of_birth' => '1996-05-24',
                'address' => $address,
            ]);
        }
        $cart = Cart::content();
        $order = Order::create([
            'user_id' => $user->id,
            'receive_address' => $address,
            'receive_phone' => $phone,
            'description' => $description,
            'total_price' => 0,
            'status' => 0,
        ]);
        foreach($cart as $book) {
            $order->total_price += $book->price * $book->qty;
        }
        foreach($cart as $book) {
            $orderBook = OrderBook::create([
                'book_id' => $book->id,
                'order_id' => $order->id,
                'quantity' => $book->qty,
                'price' => $book->price,
            ]);
        }
        Cart::destroy();

        return view('done');
    }
}
