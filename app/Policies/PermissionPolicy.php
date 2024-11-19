<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
        return $user->can('View Permissions');
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

        return $user->can('View Permissions');
    }

    /**
     * Determine whether the user can create Permissions.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('Create Permissions');
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

        return $user->can('Update Permissions');
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
        return $user->can('Delete Permissions');
    }

}
