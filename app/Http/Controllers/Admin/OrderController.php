<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user:id,name')->select('id', 'status', 'user_id')->paginate(12);
        return Inertia::render('Admin/Orders/Index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('user')->findOrFail($id);
        $user = $order->user;
        $paymentDetails = $order->orderPayment()->firstOrFail();
        $shippingAddress = $user->shippingAddress()->firstOrFail();

        $orderItems = $order->orderItems()->with([
            'product' => function ($query) {
                $query->select('id', 'name', 'main_image', 'price');
            }
        ])->get();

        $orderStatusEnum = collect(OrderStatusEnum::cases())->map(fn($status) => $status->value);
        $paymentStatusEnum = collect(PaymentStatusEnum::cases())->map(fn($status) => $status->value);


        return Inertia::render('Admin/Orders/OrderDetails', [
            'orderStatusEnum' => $orderStatusEnum,
            'paymentStatusEnum' => $paymentStatusEnum,
            'user' => $user,
            'order' => $order,
            'paymentDetails' => $paymentDetails,
            'shippingAddress' => $shippingAddress,
            'orderItems' => $orderItems
        ]);
    }

    public function updateOrderStatus(Request $request, string $orderId)
    {

        $order = Order::findOrFail($orderId);
        $order->update(['status' => $request->orderStatus]);
        return back()->with('message', ['message' => 'Order Status Changed Successfully.', 'type' => 'success']);
    }

    public function updatePaymentStatus(Request $request, string $orderId)
    {

        $order = Order::findOrFail($orderId);
        $order->orderPayment?->update(['status' => $request->paymentStatus]);
        return back()->with('message', ['message' => 'Payment Status Changed Successfully.', 'type' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
