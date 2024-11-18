<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

  /**
     * Determine whether the user can View any role.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view-any Roles');
    }

    /**
     * Determine whether the user can View a role.
     *
     * @param \App\Models\User $user
     * @param int $roleId
     *
     * @return bool
     */
    public function view(User $user, int $roleId)
    {
        if ($user->role_id == $roleId) {
            return true;
        }

        return $user->can('View Roles');
    }

    /**
     * Determine whether the user can create Roles.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('Create Roles');
    }

    /**
     * Determine whether the user can update a role.
     *
     * @param \App\Models\User $user
     * @param int $roleId
     *
     * @return bool
     */
    public function update(User $user, int $roleId)
    {
        if ($user->id == $roleId) {
            return true;
        }

        return $user->can('Update Roles');
    }

    /**
     * Determine whether the user can delete a role.
     *
     * @param \App\Models\User $user
     * @param int              $roleId
     *
     * @return bool
     */
    public function delete(User $user, int $roleId)
    {
        return $user->can('Delete Roles');
    }

    /**
     * Determine whether the user can sync role permissions.
     *
     * @param \App\Models\User $user
     * @param int              $roleId
     *
     * @return bool
     */
    public function syncPermissions(User $user, int $roleId)
    {
        return $user->can('Sync-Permissions Roles');
    }
    
}
