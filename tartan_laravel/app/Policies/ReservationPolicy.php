<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReservationPolicy
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
        return $user->can('view_own_reservation') || $user->can('view_reservation');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Reservation $reservation
     * @return Response|bool
     */
    public function view(User $user, Reservation $reservation): Response|bool
    {
        if ($user->can('view_reservation')) {
            return true;
        }

        if ($user->can('view_own_reservation')) {
            $reservation->loadMissing('playground');
            return $user->id === $reservation->playground->user_id;
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
        return $user->can('create_reservation');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Reservation $reservation
     * @return Response|bool
     */
    public function update(User $user, Reservation $reservation): Response|bool
    {
        if ($user->can('update_reservation')) {
            return true;
        }

        if ($user->can('update_own_reservation')) {
            $reservation->loadMissing('playground');
            return $user->id === $reservation->playground->user_id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Reservation $reservation
     * @return Response|bool
     */
    public function delete(User $user, Reservation $reservation): Response|bool
    {
        if ($user->can('delete_reservation')) {
            return true;
        }

        if ($user->can('delete_own_reservation')) {
            $reservation->loadMissing('playground');
            return $user->id === $reservation->playground->user_id;
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
        return $user->can('delete_reservation');
    }

}
