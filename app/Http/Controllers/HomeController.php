<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function addToCart($id) {
        $product = Product::FindOrFail($id);
        $cart = session()->get('cart');
        $total = 0;

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "img" => $product->img
                ]
            ];
        }
        // if cart not empty then check if this product exist then increment quantity
        elseif (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }
        // if item not exist in cart then add to cart with quantity = 1
        else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "img" => $product->img
            ];

        }
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        session()->put('cart', $cart);
        session()->put('total', $total);
        return redirect()->back();
    }

    public function removeFromCart($id) {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return back();
    }
}
