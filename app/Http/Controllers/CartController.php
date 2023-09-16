<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('moveToWishlist');
    }

    public function index() {
        $suggests = Product::groupBy('name')->limit(5)->get();
        if (Session::has('cart') && !empty(Session::get('cart'))) {
            $total = 0;
            $cart = Session::get('cart');
            foreach($cart as $item) {
                $total += ($item['product']->price * $item['quantity']);
            }

            $vat = $total * 0.05;
            $taxed_total = $vat + $total;

            $order = [
                'untaxed_total' => $total,
                'vat' => $vat,
                'grand_total' => $taxed_total,
            ];

            Session::put('order', $order);
        }

        return view('cart.index', compact('suggests'));
    }

    public function update(Request $request, $id) {
        $cart = $request->session()->get('cart');
        $order = $request->session()->get('order');
        $index = array_search(Product::find($id), array_column($cart, 'product'));

        $order['untaxed_total'] -= ($cart[$index]['sub_total']);

        $cart[$index]['quantity'] = $request->quantity;
        $cart[$index]['sub_total'] = $cart[$index]['product']->price * $cart[$index]['quantity'];

        $order['untaxed_total'] += ($cart[$index]['sub_total']);
        $order['vat'] = $order['untaxed_total'] * 0.05;
        $order['grand_total'] = $order['untaxed_total'] + $order['vat'];

        $request->session()->put('cart', $cart);
        $request->session()->put('order', $order);

        return response()->json(['success' => true]);
    }

    public function addToCart(Product $product, Request $request) {
        if(!$request->session()->has('cart')) {
            $cart = array();
            $cart[] = [
                'product' => $product,
                'quantity' => 1,
                'sub_total' => $product->price,
            ];
        } else {
            $cart = $request->session()->get('cart');

            $index = array_search($product, array_column($cart, 'product'));

            if ($index !== false) {
                $cart[$index]['quantity']++;
                $cart[$index]['sub_total'] = $cart[$index]['product']->price * $cart[$index]['quantity'];
            } else {
                $cart[] = [
                    'product' => $product,
                    'quantity' => 1,
                    'sub_total' => $product->price,
                ];
            }
        }

        $request->session()->put('cart', $cart);
        return back()->with('message', 'Added to Cart! Give it a look!')->with('class', 'success');
    }

    public function remove(Product $product, Request $request) {
        $cart = $request->session()->get('cart');
        $order = $request->session()->get('order');

        $index = array_search($product, array_column($cart, 'product'));
        $order['untaxed_total'] -= ($cart[$index]['sub_total']);

        unset($cart[$index]);

        if (empty($cart)) {
            $request->session()->forget('cart');
            $request->session()->forget('order');
        } else {
            $new = array();
            foreach($cart as $item) {
                $new[] = $item;
            }

            $order['vat'] = $order['untaxed_total'] * 0.05;
            $order['grand_total'] = $order['untaxed_total'] + $order['vat'];
            $request->session()->put('cart', $new);
            $request->session()->put('order', $order);
        }

        return redirect(route('cart.index'));
    }

    public function moveToWishlist(Product $product, Request $request) {
        $cart = $request->session()->get('cart');
        $order = $request->session()->get('order');

        $index = array_search($product, array_column($cart, 'product'));
        $order['untaxed_total'] -= ($cart[$index]['sub_total']);

        unset($cart[$index]);

        if (empty($cart)) {
            $request->session()->forget('cart');
            $request->session()->forget('order');
        } else {
            $new = array();
            foreach($cart as $item) {
                $new[] = $item;
            }

            $order['vat'] = $order['untaxed_total'] * 0.05;
            $order['grand_total'] = $order['untaxed_total'] + $order['vat'];
            $request->session()->put('cart', $new);
            $request->session()->put('order', $order);
        }

        $wishlist = Wishlist::firstOrNew(['user_id' =>  Auth::user()->id]);
        $wishlist->product_id = $product->id;
        $wishlist->save();

        return back();
    }
}
