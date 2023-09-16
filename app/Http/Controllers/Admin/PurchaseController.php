<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{

    public function index()
    {
        $purchases = Purchase::all();
        return view('admin.purchases.index', compact('purchases'));
    }

    public function create()
    {
        $this->authorize('create', Purchase::class);

        $products = Product::all();
        $suppliers = Supplier::all();
        if (Session::has('purchase_details') && !empty(Session::get('purchase_details'))) {
            $total = 0;
            $purchase_details = Session::get('purchase_details');
            foreach($purchase_details as $detail) {
                $total += $detail['sub_total'];
            }

            $vat = $total * 0.05;
            $taxed_total = $vat + $total;

            $purchase = [
                'untaxed_total' => $total,
                'vat' => $vat,
                'grand_total' => $taxed_total,
            ];

            Session::put('purchase', $purchase);
        }
        return view('admin.purchases.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Purchase::class);

        $data = $request->validate([
            'purchase_date' => 'required|date',
            'supplier_id' => 'required',
        ]);
        $data['admin_id'] = Auth::user()->id;

        $data += $request->session()->get('purchase');
        $purchase = Purchase::create($data);

        foreach ($request->session()->get('purchase_details') as $purchase_detail) {
            $detail_data = array();
            $detail_data['purchase_id'] = $purchase->id;
            $detail_data['product_id'] = $purchase_detail['product']->id;
            unset($purchase_detail['product']);
            $detail_data += $purchase_detail;

            PurchaseDetail::create($detail_data);
        }

        $request->session()->forget('purchase');
        $request->session()->forget('purchase_details');

        return redirect(route('admin.purchases.index'))->with('message', 'Purchase Successfully Saved!')
            ->with('class', 'success');
    }

    public function show(Purchase $purchase)
    {
        $purchase_details = PurchaseDetail::with('product', 'purchase')->where('purchase_id', $purchase->id)->get();
        return view('admin.purchases.show', compact('purchase', 'purchase_details'));
    }


    public function destroy(Purchase $purchase)
    {
        $this->authorize('delete', $purchase);

        $purchase->delete();
        return back()->with('message', 'Purchase Successfully Deleted!')
            ->with('class', 'success');
    }

    public function approve(Purchase $purchase)
    {
        $this->authorize('update', $purchase);

        $purchase->status = 'approved';
        $purchase->save();
        return back()->with('message', 'Purchase Approved!')->with('class', 'success');
    }

    public function complete(Purchase $purchase)
    {
        $this->authorize('update', $purchase);

        $purchase->status = 'completed';
        $purchase_details = PurchaseDetail::with('product', 'purchase')->where('purchase_id', $purchase->id)->get();

        foreach($purchase_details as $detail) {
            $product = Product::find($detail->product_id);
            $product->instock += $detail->quantity;
            $product->save();
        }

        $purchase->save();
        return back()->with('message', 'Purchase Completed!')->with('class', 'success');
    }
}
