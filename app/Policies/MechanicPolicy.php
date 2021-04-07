<?php

namespace App\Policies;

use App\Models\Mechanic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MechanicPolicy
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
        return $user->can('View Mechanic');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mechanic  $mechanic
     * @return mixed
     */
    public function view(User $user, Mechanic $mechanic)
    {
        //
        return $user->can('View Mechanic');
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
        return $user->can('Create Mechanic');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mechanic  $mechanic
     * @return mixed
     */
    public function update(User $user, Mechanic $mechanic)
    {
        //
        return $user->can('Update Mechanic');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mechanic  $mechanic
     * @return mixed
     */
    public function delete(User $user, Mechanic $mechanic)
    {
        //
        return $user->can('Delete Mechanic');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mechanic  $mechanic
     * @return mixed
     */
    public function restore(User $user, Mechanic $mechanic)
    {
        //
        return $user->can('Restore Mechanic');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mechanic  $mechanic
     * @return mixed
     */
    public function forceDelete(User $user, Mechanic $mechanic)
    {
        //
    }
}
