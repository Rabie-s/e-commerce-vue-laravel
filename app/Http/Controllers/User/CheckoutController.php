<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function index(){
        $cartContent = Cart::content();
        return Inertia::render('User/Checkout/Checkout', ['cartContent' => $cartContent]);
    }
}
