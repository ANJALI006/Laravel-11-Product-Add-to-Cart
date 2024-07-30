<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = Cart::where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function removeFromCart($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart.index');
    }
}
