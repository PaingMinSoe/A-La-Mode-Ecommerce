<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyCardRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeClient;

class CheckoutController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('cart') && Session::has('order'))
            return view('checkout.index');
        else
            return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        if (Auth::check()) {
            $data = $validated;
            $data['order_date'] = Carbon::now()->toDateString();
            $data['status'] = 'in progress';

            $data['user_id'] = Auth::user()->id;

            $data += $request->session()->get('order');
            $order = Order::create($data);

            foreach ($request->session()->get('cart') as $order_detail) {
                $detail_data = array();
                $detail_data['order_id'] = $order->id;
                $detail_data['product_id'] = $order_detail['product']->id;
                unset($order_detail['product']);
                $detail_data += $order_detail;

                OrderDetail::create($detail_data);
            }

            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create([
                'amount' => $data['grand_total'] . '00',
                'currency' => 'MMK',
                'source' => $request->stripeToken,
                'description' => 'Payment for Order - ' . $order->id,
            ]);

            $request->session()->forget('order');
            $request->session()->forget('cart');

            return redirect(route('index'))->with('message', 'Order Placed! Please check your profile.')
                ->with('class', 'success');
        }

        return redirect(route('login'))->with('message', 'Please log in to checkout the items')
                     ->with('class', 'warning');
    }
}
