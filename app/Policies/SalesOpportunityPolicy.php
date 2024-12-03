<?php

namespace App\Policies;

use App\Models\User;

class SalesOpportunityPolicy
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

        return $user->hasPermission('ViewSalesOpportunity');
    }

    public function create(User $user)
    {
        return $user->hasPermission('CreateSalesOpportunity');
    }

    public function edit(User $user)
    {
        return $user->hasPermission('EditSalesOpportunity');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('DeleteSalesOpportunity');
    }

    public function view(User $user)
    {
        return $user->hasPermission('ViewSalesOpportunity');
    }
}
