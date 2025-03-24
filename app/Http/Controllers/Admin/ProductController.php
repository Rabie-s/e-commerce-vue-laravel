<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category:id,name')
            ->select('id', 'name', 'price', 'quantity', 'category_id')
            ->latest()
            ->paginate(12);

        return Inertia::render('Admin/Products/Index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return Inertia::render('Admin/Products/Create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $validatedData = $request->validated();
        // Store the main image
        $mainImagePath = $request->file('main_image')->store('images', 'public'); // Use 'public' disk for better file management
        $mainImageName = basename($mainImagePath); // Extract the file name

        // Get the authenticated admin
        $authenticatedAdmin = Auth::guard('admin')->user();

        // Create the product
        $product = $authenticatedAdmin->products()->create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'price' => $validatedData['price'],
            'main_image' => $mainImageName,
            'quantity' => $validatedData['quantity'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);

        // Store additional product images if provided
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public'); // Store the image in the 'public' disk
                $imageName = basename($imagePath);

                // Create a record in the product_images table
                $product->productImages()->create([
                    'image' => $imageName,
                ]);
            }
        }

        // Redirect with a success message
        return back()->with('message', ['message' => 'Product created successfully.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        return Inertia::render('Admin/Products/Edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        
        $product = Product::findOrFail($id);

        $validatedData = $request->validated();

        $product->update([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);

        if ($request->hasFile('main_image')) {
            
            if ($product->main_image) {
                $oldImagePath = storage_path('app/public/images/' . $product->main_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $mainImagePath = $request->file('main_image')->store('images', 'public');
            $product->update(['main_image' => basename($mainImagePath)]);
        }

        if ($request->hasFile('images')) {
         
            foreach ($product->productImages as $image) {
                $oldImagePath = storage_path('app/public/images/' . $image->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $product->productImages()->delete();

        
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
                $product->productImages()->create(['image' => basename($imagePath)]);
            }
        }

        return back()->with('message', ['message' => 'Product updated successful', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the main image from the file system
        if ($product->main_image) {
            $mainImagePath = storage_path('app/public/images/' . $product->main_image);
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath); // Delete the file
            }
        }

        // Delete additional product images from the file system and database
        foreach ($product->productImages as $image) {
            $imagePath = storage_path('app/public/images/' . $image->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the file
            }
        }
        $product->productImages()->delete();
        $product->delete();
        return back()->with('message', ['message' => 'Product deleted successful', 'type' => 'success']);
    }
}
