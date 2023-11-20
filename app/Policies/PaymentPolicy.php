<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
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
        return $user->can('view-any payments');
    }

    /**
     * Determine whether the user can view a role.
     *
     * @param \App\Models\User $user
     * @param int $paymentId
     *
     * @return bool
     */
    public function view(User $user, int $paymentId)
    {
        if ($user->role_id == $paymentId) {
            return true;
        }

        return $user->can('view payments');
    }

    /**
     * Determine whether the user can create payments.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create payments');
    }

    /**
     * Determine whether the user can update a role.
     *
     * @param \App\Models\User $user
     * @param int $paymentId
     *
     * @return bool
     */
    public function update(User $user, int $paymentId)
    {
        if ($user->id == $paymentId) {
            return true;
        }

        return $user->can('update payments');
    }

    /**
     * Determine whether the user can delete a role.
     *
     * @param \App\Models\User $user
     * @param int              $paymentId
     *
     * @return bool
     */
    public function delete(User $user, int $paymentId)
    {
        return $user->can('delete payments');
    }

    /**
     * Determine whether the user can sync role permissions.
     *
     * @param \App\Models\User $user
     * @param int              $paymentId
     *
     * @return bool
     */
    public function syncPermissions(User $user, int $paymentId)
    {
        return $user->can('sync-permissions payments');
    }

}
