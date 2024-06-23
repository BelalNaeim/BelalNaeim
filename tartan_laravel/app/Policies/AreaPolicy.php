<?php

namespace App\Policies;

use App\Models\Area;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AreaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $user->can('view_area'); // $user->can('view_own_area') ||
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Area $area
     * @return Response|bool
     */
    public function view(User $user, Area $area): Response|bool
    {
        if ($user->can('view_area')) {
            return true;
        }

//        if ($user->can('view_own_area')) {
//            return $user->id === $area->user_id;
//        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return $user->can('create_area');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Area $area
     * @return Response|bool
     */
    public function update(User $user, Area $area): Response|bool
    {
        if ($user->can('update_area')) {
            return true;
        }

//        if ($user->can('update_own_area')) {
//            return $user->id === $area->user_id;
//        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Area $area
     * @return Response|bool
     */
    public function delete(User $user, Area $area): Response|bool
    {
        if ($user->can('delete_area')) {
            return true;
        }

//        if ($user->can('delete_own_area')) {
//            return $user->id === $area->user_id;
//        }

        return false;
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param User $user
     * @return Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_area');
    }

}
