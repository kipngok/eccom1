<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VehicleModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehicleModelPolicy
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
        return $user->can('View Model');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return mixed
     */
    public function view(User $user, VehicleModel $vehicleModel)
    {
        //
        return $user->can('View Model');
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
        return $user->can('Create Model');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return mixed
     */
    public function update(User $user, VehicleModel $vehicleModel)
    {
        //
        return $user->can('Edit Model');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return mixed
     */
    public function delete(User $user, VehicleModel $vehicleModel)
    {
        //
        return $user->can('Delete Model');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return mixed
     */
    public function restore(User $user, VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return mixed
     */
    public function forceDelete(User $user, VehicleModel $vehicleModel)
    {
        //
    }
}
