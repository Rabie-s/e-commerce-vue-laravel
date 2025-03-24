<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index()
    {
        //session()->forget('cart');

        $cartTotal = Cart::total();
        return Inertia::render('User/Cart/Cart', ['cartTotal' => $cartTotal]);
    }


    public function addToCart(Request $request)
    {

        $validated = $request->validate([
            'productId' => 'numeric',
            'price' => 'numeric',
            'quantity' => 'numeric'
        ]);

        $product = Product::findOrFail($request->productId);
        Cart::add(
            $product->id,
            $product->name,
            $request->quantity,
            $request->price,
            0,
            ['main_image' => $product->main_image_url]
        );
    }

    public function updateItem(Request $request)
    {

        $validated = $request->validate([
            'quantity' => 'numeric'
        ]);

        Cart::update($request->rowId, $request->qty);
    }

    public function removeItem(Request $request)
    {
        Cart::remove($request->rowId);
    }

    public function destroyCart()
    {
        Cart::destroy();
    }
}
