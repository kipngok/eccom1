<?php

namespace App\Policies;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
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
        return $user->can('View OrderItem');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return mixed
     */
    public function view(User $user, OrderItem $orderItem)
    {
        //
         return $user->can('View OrderItem');
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
         return $user->can('Create OrderItem');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return mixed
     */
    public function update(User $user, OrderItem $orderItem)
    {
        //
         return $user->can('Update OrderItem');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return mixed
     */
    public function delete(User $user, OrderItem $orderItem)
    {
        //
         return $user->can('Delete OrderItem');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return mixed
     */
    public function restore(User $user, OrderItem $orderItem)
    {
        //
         return $user->can('Restore OrderItem');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return mixed
     */
    public function forceDelete(User $user, OrderItem $orderItem)
    {
        //
    }
}
