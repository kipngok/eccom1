<?php

namespace App\Policies;

use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
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
        return $user->can('View SubCategory');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubCategory  $subCategory
     * @return mixed
     */
    public function view(User $user, SubCategory $subCategory)
    {
        //
        return $user->can('View SubCategory');
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
        return $user->can('Create SubCategory');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubCategory  $subCategory
     * @return mixed
     */
    public function update(User $user, SubCategory $subCategory)
    {
        //
        return $user->can('Update SubCategory');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubCategory  $subCategory
     * @return mixed
     */
    public function delete(User $user, SubCategory $subCategory)
    {
        //
        return $user->can('Delete SubCategory');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubCategory  $subCategory
     * @return mixed
     */
    public function restore(User $user, SubCategory $subCategory)
    {
        //
        return $user->can('Restore SubCategory');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SubCategory  $subCategory
     * @return mixed
     */
    public function forceDelete(User $user, SubCategory $subCategory)
    {
        //
    }
}
