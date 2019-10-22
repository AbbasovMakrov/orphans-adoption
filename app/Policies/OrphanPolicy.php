<?php

namespace App\Policies;

use App\User;
use App\Orphan;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrphanPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can update the orphan.
     *
     * @param  \App\User  $user
     * @param  \App\Orphan  $orphan
     * @return mixed
     */
    public function update(User $user, Orphan $orphan)
    {
        return $user->id === $orphan->user_id;
    }

    /**
     * Determine whether the user can delete the orphan.
     *
     * @param  \App\User  $user
     * @param  \App\Orphan  $orphan
     * @return mixed
     */
    public function delete(User $user, Orphan $orphan)
    {
        return $user->id === $orphan->user_id;
    }

    /**
     * Determine whether the user can restore the orphan.
     *
     * @param  \App\User  $user
     * @param  \App\Orphan  $orphan
     * @return mixed
     */
    public function restore(User $user, Orphan $orphan)
    {
        return $user->id === $orphan->user_id;
    }

    /**
     * Determine whether the user can permanently delete the orphan.
     *
     * @param  \App\User  $user
     * @param  \App\Orphan  $orphan
     * @return mixed
     */
    public function forceDelete(User $user, Orphan $orphan)
    {
        return $user->id === $orphan->user_id;
    }
}
