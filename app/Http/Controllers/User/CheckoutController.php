<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Enums\OrderStatusEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\PaymentStatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\StoreCheckoutRequest;


class CheckoutController extends Controller
{
    public function index()
    {
        
        $cartTotal = Cart::total();
        return Inertia::render('User/Checkout/Checkout', [ 'cartTotal' => $cartTotal]);
    }

    public function placeOrder(StoreCheckoutRequest $request)
    {



        /* $authenticatedUser = Auth::guard('user')->user();

        //order
        $order = $authenticatedUser->orders()->create([
            'status' => OrderStatusEnum::PENDING->value,
        ]);

        //order items   
        $cartContent = Cart::content();
        foreach ($cartContent as $item) {
            $order->orderItems()->create([
                'quantity' => $item->qty,
                'price' => $item->price * $item->qty,
                'product_id' => $item->id,
            ]);
        }

        //shipping address
        $authenticatedUser->shippingAddress()->updateOrCreate(
            ['user_id' => $authenticatedUser->id],
            [
                'first_name' => $request->shippingAddress['first_name'],
                'last_name' => $request->shippingAddress['last_name'],
                'country' => $request->shippingAddress['country'],
                'area' => $request->shippingAddress['area'],
                'street_address' => $request->shippingAddress['street_address'],
                'phone_number' => $request->shippingAddress['phone_number'],

            ]
        );
        //order payment
        $order->orderPayment()->create([
            'payment_method' => $request->orderPayment['payment_method'],
            'amount' => Cart::total(),
            'status' => PaymentStatusEnum::PENDING->value,
        ]); */
    }
}
