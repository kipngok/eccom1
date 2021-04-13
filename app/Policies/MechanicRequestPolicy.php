<?php

namespace App\Policies;

use App\Models\MechanicRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MechanicRequestPolicy
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
        return $user->can('View MechanicRequest');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return mixed
     */
    public function view(User $user, MechanicRequest $mechanicRequest)
    {
        //
        return $user->can('View MechanicRequest');
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
        return $user->can('Create MechanicRequest');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return mixed
     */
    public function update(User $user, MechanicRequest $mechanicRequest)
    {
        //
        return $user->can('Edit MechanicRequest');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return mixed
     */
    public function delete(User $user, MechanicRequest $mechanicRequest)
    {
        //
        return $user->can('Delete MechanicRequest');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return mixed
     */
    public function restore(User $user, MechanicRequest $mechanicRequest)
    {
        //
        return $user->can('Restore MechanicRequest');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MechanicRequest  $mechanicRequest
     * @return mixed
     */
    public function forceDelete(User $user, MechanicRequest $mechanicRequest)
    {
        //
    }
}
