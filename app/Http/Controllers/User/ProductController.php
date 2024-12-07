<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all();
            return Inertia::render('User/Products/Products', [
                'products' => $products
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors('not found');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::with('ProductImages')->where('id', $id)->firstOrFail();
            return Inertia::render('User/Products/Product', [
                'product' => $product
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors('not found');
        }
    }

    public function showProductsByCategories(string $id){
        $products = Product::where('category_id',$id)->get();
        return Inertia::render('User/Products/Products', [
            'products' => $products
        ]);
    }
}
