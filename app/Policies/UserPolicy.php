<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
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

        return $user->hasPermission('ViewUser');
    }

    public function create(User $user)
    {
        return $user->hasPermission('CreateUser');
    }

    public function edit(User $user)
    {
        return $user->hasPermission('EditUser');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('DeleteUser');
    }

    public function view(User $user)
    {
        return $user->hasPermission('ViewUser');
    }
}
