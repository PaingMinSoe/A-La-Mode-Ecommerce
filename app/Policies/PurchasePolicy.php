<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PurchasePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Admin $admin) {
        return $admin->role == 'admin' || $admin->role == 'staff';
    }

    public function update(Admin $admin, Purchase $purchase) {
        return $admin->role == 'admin';
    }

    public function delete(Admin $admin, Purchase $purchase) {
        return $admin->role == 'admin' || (Auth::check() && $purchase->admin_id == Auth::user()->id);
    }
}
