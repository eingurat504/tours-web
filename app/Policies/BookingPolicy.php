<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
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
        return $user->can('view-any bookings');
    }

    /**
     * Determine whether the user can view a role.
     *
     * @param \App\Models\User $user
     * @param int $bookingId
     *
     * @return bool
     */
    public function view(User $user, int $bookingId)
    {
        if ($user->role_id == $bookingId) {
            return true;
        }

        return $user->can('view bookings');
    }

    /**
     * Determine whether the user can create bookings.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create bookings');
    }

    /**
     * Determine whether the user can update a role.
     *
     * @param \App\Models\User $user
     * @param int $bookingId
     *
     * @return bool
     */
    public function update(User $user, int $bookingId)
    {
        if ($user->id == $bookingId) {
            return true;
        }

        return $user->can('update bookings');
    }

    /**
     * Determine whether the user can delete a role.
     *
     * @param \App\Models\User $user
     * @param int              $bookingId
     *
     * @return bool
     */
    public function delete(User $user, int $bookingId)
    {
        return $user->can('delete bookings');
    }

}
