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
        $products = Product::select('id', 'name', 'main_image', 'price')
            ->latest()
            ->paginate(12);
        return Inertia::render('User/Products/Products', [
            'products' => $products
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['productImages:id,image,product_id', 'category:id,name'])
            ->select('id', 'name', 'price', 'main_image', 'description', 'category_id')
            ->findOrFail($id);

        return Inertia::render('User/Products/Product', [
            'product' => $product
        ]);

    }

    public function showProductsByCategories(string $id)
    {
        $products = Product::select('id', 'name', 'main_image', 'price')
        ->where('category_id', $id)->latest()->paginate(12);
        return Inertia::render('User/Products/Products', [
            'products' => $products
        ]);
    }
}
