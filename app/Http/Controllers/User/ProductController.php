<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Product;
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
            $products = Product::select('id', 'name', 'main_image', 'price')->orderBy('id')->paginate(12);
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
            $product = Product::with(['productImages:id,image,product_id', 'category:id,name'])->where('id', $id)->firstOrFail();
            return Inertia::render('User/Products/Product', [
                'product' => $product
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors('not found');
        }
    }

    public function showProductsByCategories(string $id)
    {
        $products = Product::select('id', 'name', 'main_image', 'price')->where('category_id', $id)->paginate(12);
        return Inertia::render('User/Products/Products', [
            'products' => $products
        ]);
    }
}
