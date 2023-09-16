<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        if (Auth::check()) {
            $wishlists = Wishlist::with('user', 'product')->where('user_id', Auth::user()->id)->get();
            return view('wishlist.index', compact('wishlists'));
        } else {
            return view('wishlist.index');
        }
    }

    public function add(Product $product)
    {
        Wishlist::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ]);

        return back();
    }

    public function remove(Product $product)
    {
        //Remove From Wishlist Code
        $wishlist = Wishlist::with('products', 'users')->where('user_id', Auth::user()->id)
        ->where('product_id' , $product->id);
        $wishlist->delete();
        return back();
    }

}
