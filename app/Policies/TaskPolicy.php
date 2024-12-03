<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
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

        return $user->hasPermission('ViewTask');
    }

    public function create(User $user)
    {
        return $user->hasPermission('CreateTask');
    }

    public function edit(User $user, Task $task)
    {
        if ($user->hasRole(['admin', 'manager'])) {
            return $user->hasPermission('ViewTask');
        }

        return $user->id === $task->user_id && $user->hasPermission('ViewTask');
    }

    public function delete(User $user, Task $task)
    {
        if ($user->hasRole(['admin', 'manager'])) {
            return $user->hasPermission('ViewTask');
        }

        return $user->id === $task->user_id && $user->hasPermission('ViewTask');
    }

    public function view(User $user, Task $task): bool
    {
        if ($user->hasRole(['admin', 'manager'])) {
            return $user->hasPermission('ViewTask');
        }

        return $user->id === $task->user_id && $user->hasPermission('ViewTask');
    }
}
