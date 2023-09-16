<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $purchaseCount = Purchase::whereBetween('created_at',
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $orderCount = Order::whereBetween('order_date',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $purchases = Purchase::all();

        $sales = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                      ->whereYear('created_at', date('Y'))
                      ->groupBy(DB::raw("Month(created_at)"))
                      ->pluck('count', 'month_name');

        $labels = $sales->keys();
        $data = $sales->values();

        $productCount = Product::count();
        $userCount = User::count();
        return view('admin.dashboard', compact('purchaseCount', 'productCount', 'userCount', 'orderCount', 'purchases', 'labels', 'data'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function update(Admin $admin, Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:admins,name,' . $admin->id,
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'address' => 'required|string|max:255',
            'nrc_number' => 'required|string|max:255|unique:admins,nrc_number,' . $admin->id,
            'phone_number' => 'required|string|max:255|unique:admins,phone_number,' . $admin->id,
            'profile_image' => 'image',
            'current_password' => ['required', 'string', 'min:8', function($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Old Password doesn\'t match.');
                }
            }],
        ]);

        if ($request->profile_image) {
            File::delete(public_path('profile_images/' .$admin->profile_image));
            $profileImage = date('YmdHis') . "_" . request()->profile_image->getClientOriginalName();
            request()->profile_image->move(public_path('profile_images'), $profileImage);
            $admin->profile_image = $profileImage;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->nrc_number = $request->nrc_number;
        $admin->phone_number = $request->phone_number;
        $admin->save();

        return back()->with('message', 'Profile Successfully Updated!')->with('class', 'success');
    }

    public function changePassword(Admin $admin, Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'old_password' => ['required', 'string', 'min:8', function($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Old Password doesn\'t match.');
                }
            }],
            'new_password' => 'required|string|min:8',
        ]);

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return back()->with('message', 'Password Updated!')->with('class', 'success');
    }
}
