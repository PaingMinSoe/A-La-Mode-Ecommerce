<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class PurchaseDetailsController extends Controller
{
    public function addProduct(Request $request) {

        $request->validate([
            'product_id' => 'required|string',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);


        if (!$request->session()->has('purchase_details')) {
            $purchase_details = array();
            $purchase_details[] = [
                'product' => Product::find($request->product_id),
                'quantity' => $request->quantity,
                'price' => $request->price,
                'sub_total' => $request->price * $request->quantity,
            ];

        } else {
            $purchase_details = $request->session()->get('purchase_details');

            $index = array_search(Product::find($request->product_id), array_column($purchase_details, 'product'));

            if ($index !== false) {
                $purchase_details[$index]['quantity'] += $request->quantity;
                $purchase_details[$index]['sub_total'] = $purchase_details[$index]['quantity'] * $request->price;
            } else {
                $purchase_details[] = [
                    'product' => Product::find($request->product_id),
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'sub_total' => $request->price * $request->quantity,
                ];
            }
        }

        $request->session()->put('purchase_details', $purchase_details);
        return redirect(route('admin.purchases.create'));

    }

    public function remove(Product $product, Request $request) {
        $purchase_details = $request->session()->get('purchase_details');

        $index = array_search($product, array_column($purchase_details, 'product'));

        unset($purchase_details[$index]);

        if (empty($purchase_details)) {
            $request->session()->forget('purchase_details');
            $request->session()->forget('purchase');
        } else {
            $new = array();
            foreach($purchase_details as $detail) {
                $new[] = $detail;
            }
            $request->session()->put('purchase_details', $new);
        }

        return redirect(route('admin.purchases.create'));
    }
}
