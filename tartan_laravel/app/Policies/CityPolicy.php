<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CityPolicy
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
        return $user->can('view_city'); // $user->can('view_own_city') ||
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param City $city
     * @return Response|bool
     */
    public function view(User $user, City $city): Response|bool
    {
        if ($user->can('view_city')) {
            return true;
        }

//        if ($user->can('view_own_city')) {
//            return $user->id === $city->user_id;
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
        return $user->can('create_city');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param City $city
     * @return Response|bool
     */
    public function update(User $user, City $city): Response|bool
    {
        if ($user->can('update_city')) {
            return true;
        }

//        if ($user->can('update_own_city')) {
//            return $user->id === $city->user_id;
//        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param City $city
     * @return Response|bool
     */
    public function delete(User $user, City $city): Response|bool
    {
        if ($user->can('delete_city')) {
            return true;
        }

//        if ($user->can('delete_own_city')) {
//            return $user->id === $city->user_id;
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
        return $user->can('delete_city');
    }

}
