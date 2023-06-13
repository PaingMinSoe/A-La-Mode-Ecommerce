<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::with('user')->where('user_id', Auth::user()->id)
                                            ->where('status', '!=', 'completed')->get();

        $order_details = OrderDetail::with('product', 'order')->whereIn('order_id' , $orders->pluck('id'))->get();

//        dd($order_details);

        return view('home', compact('orders', 'order_details'));
    }

    public function updateProfile(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'current_password' => ['required', 'string', 'min:8',
                function($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password doesn\'t match.');
                    }
                }],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->save();

        return back()->with('message', 'Profile Successfully Updated!')
            ->with('class', 'success');
    }

    public function changePassword(User $user, Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'min:8',
                function($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password doesn\'t match.');
                    }
                }],
            'new_password' => 'required|string|min:8',
        ]);

//        if ($validation->fails()) {
//            return back()->withErrors($validation);
//        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('message', 'Password Updated!')
        ->with('class', 'success');
    }

}
