<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Profile/Profile');
    }

    public function shippingAddress()
    {
        $authenticatedUser = Auth::guard('user')->user();

        try {
            $userShippingAddress = $authenticatedUser->shippingAddress()->firstOrFail();
        } catch (ModelNotFoundException $e) {

            return Inertia::render('User/Profile/ShippingAddress', ['userShippingAddress' => null]);
        }

        return Inertia::render('User/Profile/ShippingAddress', ['userShippingAddress' => $userShippingAddress]);
    }


    public function insertShippingAddress(Request $request)
    {
        $authenticatedUser = Auth::guard('user')->user();
        $authenticatedUser->shippingAddress()->updateOrCreate(
            ['user_id' => $authenticatedUser->id],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'country' => $request->country,
                'area' => $request->area,
                'street_address' => $request->street_address,
                'phone_number' => $request->phone_number,

            ]
        );
    }

    public function orders()
    {
        $authenticatedUser = Auth::guard('user')->user();
        $orders = $authenticatedUser->orders()->paginate(5);
        return Inertia::render('User/Profile/Orders', ['orders' => $orders]);
    }

    public function orderDetails(string $id)
    {
        $authenticatedUser = Auth::guard('user')->user();
        $orderDetails = $authenticatedUser->orders()->findOrFail($id);
        $paymentDetails = $orderDetails->orderPayment()->firstOrFail();
        $shippingAddress = $authenticatedUser->shippingAddress()->firstOrFail();

        $orderItems = $orderDetails->orderItems()->with([
            'product' => function ($query) {
                $query->select('id', 'name', 'main_image', 'price');
            }
        ])->get();


        //dd($orderItems);
        return Inertia::render('User/Profile/OrderDetails', [
            'orderDetails' => $orderDetails,
            'paymentDetails' => $paymentDetails,
            'shippingAddress' => $shippingAddress,
            'orderItems' => $orderItems
        ]);
    }
}
