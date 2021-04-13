<?php

namespace App\Policies;

use App\Models\Make;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MakePolicy
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
        return $user->can('View Make');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Make  $make
     * @return mixed
     */
    public function view(User $user, Make $make)
    {
        //
        return $user->can('View Make');
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
        return $user->can('Create Make');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Make  $make
     * @return mixed
     */
    public function update(User $user, Make $make)
    {
        //
         return $user->can('Edit Make');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Make  $make
     * @return mixed
     */
    public function delete(User $user, Make $make)
    {
        //
         return $user->can('Delete Make');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Make  $make
     * @return mixed
     */
    public function restore(User $user, Make $make)
    {
        //
         return $user->can('Restore Make');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Make  $make
     * @return mixed
     */
    public function forceDelete(User $user, Make $make)
    {
        //
    }
}
