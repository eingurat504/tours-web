<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentTypePolicy
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
        return $user->can('view-any payment types');
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

        return $user->can('view payment types');
    }

    /**
     * Determine whether the user can create payment types.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create payment types');
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

        return $user->can('update payment types');
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
        return $user->can('delete payment types');
    }


}
