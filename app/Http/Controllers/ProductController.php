<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function index() {
        $products = Product::groupBy('name', 'color')
            ->with('category', 'brand')
            ->search(request(['sort', 'search', 'category', 'gender', 'brand']))
            ->paginate(8)->withQueryString();
        $categories = Category::all();
        $brands = Brand::all();


        return view('products.index', compact('products', 'categories', 'brands'));
    }

    public function show(Product $product) {
        $suggests = Product::groupBy('name', 'color')
            ->where('id', '!=', $product->id)
            ->where('category_id', $product->category_id)->limit(5)->get();
        $colors = Product::where('name', $product->name)
            ->groupBy('color')->get();
        $sizes = Product::where('name', $product->name)
            ->where('color', $product->color)->get();
        $reviews = Review::where('product_id', $product->id)->paginate(3);

        return view('products.details', compact('product', 'suggests', 'colors', 'sizes', 'reviews'));
    }
}
