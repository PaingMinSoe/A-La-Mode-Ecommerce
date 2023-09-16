<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::where('id', '!=', Auth::user()->id)->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        $this->authorize('store', Admin::class);

        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $this->authorize('store', Admin::class);

        $request->validate([
            'name' => 'required|string|max:255|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'address' => 'required|string|max:255',
            'nrc_number' => 'required|string|max:255|unique:admins',
            'phone_number' => 'required|string|max:255|unique:admins',
            'password' => 'required|string|min:8',
            'gender' => 'required|string',
            'role' => 'required|string',
            'profile_image' => 'required|image',
        ]);

        $profileImage = date('YmdHis') . "_" . request()->profile_image->getClientOriginalName();
        request()->profile_image->move(public_path('profile_images'), $profileImage);


        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'nrc_number' => $request->nrc_number,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'profile_image' => $profileImage,
            'role' => $request->role,
        ]);

        return back()->with('message', 'Admin Successfully Registered!')
                    ->with('class', 'success');
    }

    public function edit(Admin $admin)
    {
        $this->authorize('update', Admin::class);
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $this->authorize('update', Admin::class);

        $request->validate([
            'name' => 'required|string|max:255|unique:admins,name,' . $admin->id,
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'address' => 'required|string|max:255',
            'nrc_number' => 'required|string|max:255|unique:admins,nrc_number,' . $admin->id,
            'phone_number' => 'required|string|max:255|unique:admins,phone_number,' . $admin->id,
            'gender' => 'required|string',
            'role' => 'required|string',
            'profile_image' => 'image',
        ]);

        if ($request->password) {
            $request->validate(['password' => 'string|min:8']);
            $admin->password = Hash::make($request->password);
        }

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
        $admin->gender = $request->gender;
        $admin->role = $request->role;
        $admin->save();

        return back()->with('message', 'Admin Account Successfully Updated!')->with('class', 'success');
    }

    public function destroy(Admin $admin)
    {
        $this->authorize('delete', $admin);

        $admin->delete();

        return back()
            ->with('message', 'Admin Account Successfully Deleted!')
            ->with('class', 'success');
    }
}
