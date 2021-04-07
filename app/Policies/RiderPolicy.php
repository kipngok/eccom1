<?php

namespace App\Policies;

use App\Models\Rider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RiderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
         return $user->can('View Rider');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rider  $rider
     * @return mixed
     */
    public function view(User $user, Rider $rider)
    {
        //
        return $user->can('View Rider');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->can('Create Rider');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rider  $rider
     * @return mixed
     */
    public function update(User $user, Rider $rider)
    {
        //
        return $user->can('Update Rider');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rider  $rider
     * @return mixed
     */
    public function delete(User $user, Rider $rider)
    {
        //
        return $user->can('Delete Rider');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rider  $rider
     * @return mixed
     */
    public function restore(User $user, Rider $rider)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Rider  $rider
     * @return mixed
     */
    public function forceDelete(User $user, Rider $rider)
    {
        //
    }
}
