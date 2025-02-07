<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::select('id', 'name', 'main_image')->orderBy('id')->get()->map(function ($faq) {
            return [
                'id' => $faq->id,
                'name' => $faq->name,
                'main_image' => asset('storage/images/' . $faq->main_image )
            ];
        });
        $lastProducts = Product::select('id', 'name', 'main_image', 'price')->latest()->limit(10)->get();


        return Inertia::render('User/Home/Home', ['categories' => $categories, 'lastProducts' => $lastProducts]);
    }
}
