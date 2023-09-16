<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
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

    public function update(Admin $admin) {
        return $admin->role == 'admin';
    }

    public function store(Admin $admin) {
        return $admin->role == 'admin';
    }

    public function delete(Admin $admin) {
        return $admin->role == 'admin';
    }
}
