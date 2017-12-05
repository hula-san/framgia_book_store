<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Framgia\Response\FlashResponse;
// use Illuminate\Http\Request;
use Cart;
use App\Models\Book;

class CartController extends Controller
{
    protected $response;

    public function __construct(FlashResponse $response)
    {
        $this->response = $response;
    }

    public function index()
    {
        $cart = Cart::content();

        return view('cart', compact('cart'));
    }

    public function cart()
    {
        $book_id = Request::get('book_id');
        if (Request::get('quantity')) {
            $quantity = Request::get('quantity');    
        } else {
            $quantity = 1;
        }
        $book = Book::find($book_id);
        Cart::add(
            $book_id, 
            $book->name, 
            $quantity, 
            $book->price, 
            [
                'image' => $book->imagePath,
            ]
        );    
        $cart = Cart::content();

        return $this->response->success('store', 'Them san pham thanh cong');
	}

    public function plusCart()
    {
        $book_id = Request::get('book_id');
        $quantity = Request::get('quantity');
        $cart = Cart::content();
        $rowId = $cart->search(function ($cartItem, $rowId) use ($book_id) {
            return $cartItem->id === $book_id;
        });
        $book = Cart::get($rowId);
        Cart::update($rowId, [
            'qty' => $quantity + 1,
        ]);

        return view('cart', compact('cart'));
    }

    public function minusCart()
    {
        $book_id = Request::get('book_id');
        $quantity = Request::get('quantity');
        $cart = Cart::content();
        $rowId = $cart->search(function ($cartItem, $rowId) use ($book_id) {
            return $cartItem->id === $book_id;
        });
        $book = Cart::get($rowId);
        Cart::update($rowId, [
            'qty' => $quantity - 1,
        ]); 

        return view('cart', compact('cart'));         
    }

    public function deleteCart()
    {
        $book_id = Request::get('book_id');
        $book = Book::find($book_id);
        $cart = Cart::content();
        $rowId = $cart->search(function ($cartItem, $rowId) use ($book_id) {
            return $cartItem->id === $book_id;
        });
        Cart::remove($rowId);

        return view('cart', compact('cart'));
    }
}
