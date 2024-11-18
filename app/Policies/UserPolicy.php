<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

  /**
     * Determine whether the user can view any role.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->can('View-any Users');
    }

    /**
     * Determine whether the user can view a role.
     *
     * @param \App\Models\User $user
     * @param int $permissionId
     *
     * @return bool
     */
    public function view(User $user, int $permissionId)
    {
        if ($user->role_id == $permissionId) {
            return true;
        }

        return $user->can('View Users');
    }

    /**
     * Determine whether the user can create Users.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('Create Users');
    }

    /**
     * Determine whether the user can update a role.
     *
     * @param \App\Models\User $user
     * @param int $permissionId
     *
     * @return bool
     */
    public function update(User $user, int $permissionId)
    {
        if ($user->id == $permissionId) {
            return true;
        }

        return $user->can('Update Users');
    }

    /**
     * Determine whether the user can delete a role.
     *
     * @param \App\Models\User $user
     * @param int              $permissionId
     *
     * @return bool
     */
    public function delete(User $user, int $permissionId)
    {
        return $user->can('Delete Users');
    }

}
