<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id', 'name', 'slug', 'main_image')
            ->orderBy('id')
            ->paginate(12);


        $categories->getCollection()->transform(function ($category) {
            $category->main_image = asset('storage/images/' . $category->main_image);
            return $category;
        });
        return Inertia::render('Admin/Categories/Index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO Validate request
        $request->validate([
            'name' => 'required|unique:categories',
            'main_image' => 'required|file|mimes:png,jpg'
        ]);
        $main_image = $request->file('main_image');
        $storeMainImage = $main_image->store('images');
        $mainImageName = explode('/', $storeMainImage);

        Category::create([
            'name' => $request->name,
            'main_image' => $mainImageName[1],
            'slug' => Str::slug($request->name)
        ]);
        return back()->with('message', ['message' => 'Category inserted successful', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Admin/Categories/Edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'unique:categories',
            'main_image' => 'sometimes|file|mimes:png,jpg'
        ]);

        $category = Category::findOrFail($id);
        if ($request->hasFile('main_image')) {
            File::delete(public_path('storage/images/' . $category->main_image));

            $main_image = $request->file('main_image');
            $storeMainImage = $main_image->store('images');
            $mainImageName = explode('/', $storeMainImage);
            $category->main_image = $mainImageName[1];
        }
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();
        
        return back()->with('message', ['message' => 'Category updated successful', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::select('id', 'main_image')->where('id', $id)->firstOrFail();
        File::delete(public_path('storage/images/' . $category->main_image));
        $category->delete();
        return back()->with('message', ['message' => 'Category deleted successful', 'type' => 'success']);
    }
}
