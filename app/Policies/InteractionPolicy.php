<?php

namespace App\Policies;

use App\Models\User;

class InteractionPolicy
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

        return $user->hasPermission('ViewInteraction');
    }

    public function create(User $user)
    {
        if ($user->hasRole(['admin', 'manager'])) {
            return $user->hasPermission('CreateInteraction');
        }
        return $user->hasPermission('CreateInteraction');
    }

    public function edit(User $user)
    {
        if ($user->hasRole(['admin', 'manager'])) {
            return $user->hasPermission('EditInteraction');
        }
        return $user->hasPermission('EditInteraction');
    }

    public function delete(User $user)
    {
        if ($user->hasRole(['admin', 'manager'])) {
            return $user->hasPermission('DeleteInteraction');
        }
        return $user->hasPermission('DeleteInteraction');
    }

    public function view(User $user)
    {
        if ($user->hasRole(['admin', 'manager'])) {
            return $user->hasPermission('ViewInteraction');
        }
        return $user->hasPermission('ViewInteraction');
    }
}
