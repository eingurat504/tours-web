<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
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
        return $user->can('View Activities');
    }

    /**
     * Determine whether the user can view a role.
     *
     * @param \App\Models\User $user
     * @param int $activityId
     *
     * @return bool
     */
    public function view(User $user, int $activityId)
    {
        if ($user->role_id == $activityId) {
            return true;
        }

        return $user->can('View Activities');
    }

    /**
     * Determine whether the user can create activities.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('Create Activities');
    }

    /**
     * Determine whether the user can update a role.
     *
     * @param \App\Models\User $user
     * @param int $activityId
     *
     * @return bool
     */
    public function update(User $user, int $activityId)
    {
        if ($user->id == $activityId) {
            return true;
        }

        return $user->can('Update Activities');
    }

    /**
     * Determine whether the user can delete a role.
     *
     * @param \App\Models\User $user
     * @param int              $activityId
     *
     * @return bool
     */
    public function delete(User $user, int $activityId)
    {
        return $user->can('Delete Activities');
    }

}
