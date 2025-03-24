<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreShippingAddressRequest;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Profile/Profile');
    }

    public function shippingAddress()
    {
        $authenticatedUser = auth('user')->user();

        $userShippingAddress = $authenticatedUser->shippingAddress()->first();
    
        return Inertia::render('User/Profile/ShippingAddress', ['userShippingAddress' => $userShippingAddress]);
    }


    public function insertShippingAddress(StoreShippingAddressRequest $request)
    {
        $authenticatedUser = auth('user')->user();
        $authenticatedUser->shippingAddress()->updateOrCreate(
            ['user_id' => $authenticatedUser->id],
            [
                ...$request->validated()
            ]
        );
        return redirect()->back()
        ->with('message',['message'=>'Shipping address updated successfully','type'=>'success']);
    }

    public function orders()
    {
        $authenticatedUser = auth('user')->user();
        $orders = $authenticatedUser->orders()
        ->select('id','status','created_at')
        ->latest()
        ->paginate(5);
        
        return Inertia::render('User/Profile/Orders', ['orders' => $orders]);
    }

    public function orderDetails(string $id)
    {
        $authenticatedUser = auth('user')->user();
        $orderDetails = $authenticatedUser->orders()->findOrFail($id);
        $paymentDetails = $orderDetails->orderPayment()->firstOrFail();
        $shippingAddress = $authenticatedUser->shippingAddress()->firstOrFail();

        $orderItems = $orderDetails->orderItems()
        ->with('product:id,name,main_image,price,main_image')
        ->get();

        return Inertia::render('User/Profile/OrderDetails', [
            'orderDetails' => $orderDetails,
            'paymentDetails' => $paymentDetails,
            'shippingAddress' => $shippingAddress,
            'orderItems' => $orderItems
        ]);
    }
}
