<?php

namespace App\Policies;

use App\Models\User;

class CustomerPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {

        return $user->hasPermission('ViewCustomer');
    }

    public function create(User $user)
    {
        return $user->hasPermission('CreateCustomer');
    }

    public function edit(User $user)
    {
        return $user->hasPermission('EditCustomer');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('DeleteCustomer');
    }

    public function view(User $user)
    {
        return $user->hasPermission('ViewCustomer');
    }
}
