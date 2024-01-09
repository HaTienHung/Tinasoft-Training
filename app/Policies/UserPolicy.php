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
    public function viewInstructorList(User $user)
    {
        return $user->role->role_name === 'admin';
    }
    public function addInstructorList(User $user)
    {
        return $user->role->role_name === 'admin';
    }
    public function addUserList(User $user)
    {
        return in_array($user->role->role_name, ['instructor', 'admin']);
    }
    // app/Policies/UserPolicy.php
    // public function viewAny(User $user)
    // {
    //     return $user->hasRole('admin') || $user->hasRole('instructor');
    // }

    // public function view(User $user, User $targetUser)
    // {
    //     return $user->hasRole('admin') || ($user->hasRole('instructor') && $user->id === $targetUser->id);
    // }

    // public function create(User $user)
    // {
    //     return $user->hasRole('admin') || $user->hasRole('instructor');
    // }

    // public function update(User $user, User $targetUser)
    // {
    //     return $user->hasRole('admin') || ($user->hasRole('instructor') && $user->id === $targetUser->id);
    // }

    // public function delete(User $user, User $targetUser)
    // {
    //     return $user->hasRole('admin') || ($user->hasRole('instructor') && $user->id === $targetUser->id);
    // }
}
