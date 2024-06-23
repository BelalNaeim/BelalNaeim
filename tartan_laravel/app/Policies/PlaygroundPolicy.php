<?php

namespace App\Policies;

use App\Models\Playground;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PlaygroundPolicy
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
        return $user->can('view_own_playground') || $user->can('view_playground');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Playground $playground
     * @return Response|bool
     */
    public function view(User $user, Playground $playground): Response|bool
    {
        if ($user->can('view_playground')) {
            return true;
        }

        if ($user->can('view_own_playground')) {
            return $user->id === $playground->user_id;
        }

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
        return $user->can('create_playground');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Playground $playground
     * @return Response|bool
     */
    public function update(User $user, Playground $playground): Response|bool
    {
        if ($user->can('update_playground')) {
            return true;
        }

        if ($user->can('update_own_playground')) {
            return $user->id === $playground->user_id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Playground $playground
     * @return Response|bool
     */
    public function delete(User $user, Playground $playground): Response|bool
    {
        if ($user->can('delete_playground')) {
            return true;
        }

        if ($user->can('delete_own_playground')) {
            return $user->id === $playground->user_id;
        }

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
        return $user->can('delete_playground');
    }

}
