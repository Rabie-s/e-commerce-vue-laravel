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

        $categories = Category::select('id', 'name', 'main_image')->get();
        $lastProducts = Product::select('id', 'name', 'main_image','price')->latest()->limit(10)->get();

        return Inertia::render('User/Home/Home', ['categories' => $categories, 'lastProducts' => $lastProducts]);
    }
}
