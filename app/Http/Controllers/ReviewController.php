<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Product $product, Request $request)
    {
        $request->validate([
            'rating' => 'required|integer',
            'comment' => 'required|string|max:255',
        ]);

        Review::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        $product->average_rating = Review::with('product', 'user')->where('product_id', $product->id)->avg('rating');
        $product->save();

        return back()->with('message', 'Review is added for this product!')
                    ->with('class', 'success');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();

        $product = Product::find($review->product->id);

        $product_review = Review::with('product', 'user')->where('product_id', $product->id);
        $product->average_rating = $product_review->exists() ? $product_review->avg('rating') : 0;
        $product->save();

        return back()->with('message', 'Your review for this product is removed!')
            ->with('class', 'success');
    }
}
