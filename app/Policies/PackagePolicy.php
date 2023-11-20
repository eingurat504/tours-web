<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
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
        return $user->can('view-any packages');
    }

    /**
     * Determine whether the user can view a role.
     *
     * @param \App\Models\User $user
     * @param int $packageId
     *
     * @return bool
     */
    public function view(User $user, int $packageId)
    {
        if ($user->role_id == $packageId) {
            return true;
        }

        return $user->can('view packages');
    }

    /**
     * Determine whether the user can create packages.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create packages');
    }

    /**
     * Determine whether the user can update a role.
     *
     * @param \App\Models\User $user
     * @param int $packageId
     *
     * @return bool
     */
    public function update(User $user, int $packageId)
    {
        if ($user->id == $packageId) {
            return true;
        }

        return $user->can('update packages');
    }

    /**
     * Determine whether the user can delete a role.
     *
     * @param \App\Models\User $user
     * @param int              $packageId
     *
     * @return bool
     */
    public function delete(User $user, int $packageId)
    {
        return $user->can('delete packages');
    }


}
