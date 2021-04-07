<?php

namespace App\Policies;

use App\Models\SpareRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpareRequestPolicy
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
        return $user->can('View SpareRequest');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return mixed
     */
    public function view(User $user, SpareRequest $spareRequest)
    {
        //
        return $user->can('View SpareRequest');
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
        return $user->can('Create SpareRequest');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return mixed
     */
    public function update(User $user, SpareRequest $spareRequest)
    {
        //
        return $user->can('Update SpareRequest');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return mixed
     */
    public function delete(User $user, SpareRequest $spareRequest)
    {
        //
        return $user->can('Delete SpareRequest');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return mixed
     */
    public function restore(User $user, SpareRequest $spareRequest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SpareRequest  $spareRequest
     * @return mixed
     */
    public function forceDelete(User $user, SpareRequest $spareRequest)
    {
        //
    }
}
