<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Component\HttpFoundation\Response;

class EnsureCartIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if cart is empty return back
        if (!Cart::count() >= 1) {
            return redirect()->back()->with('message', [
                'message' => 'Your cart is empty. Please add items to proceed.',
                'type' => 'warning'
            ]);
        }
        return $next($request);
    }
}
