<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail();
        \Cart::add(array(
            'id' => '3',
            'name' => 'testName',
            'price' => 111,
            'quantity' => 1,
        ));
    }

    public function index()
    {
        // view the cart items
        $items = \Cart::getContent();
        return $items;
    }
}
