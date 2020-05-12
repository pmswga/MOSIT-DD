<?php

namespace App\Policies;

use App\Models\Main\IP\IP;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IPPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any i p s.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the i p.
     *
     * @param  \App\User  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function view(User $user, IP $iP)
    {
        return true;
    }

    /**
     * Determine whether the user can create i p s.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the i p.
     *
     * @param  \App\User  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function update(User $user, IP $iP)
    {
        //
    }

    /**
     * Determine whether the user can delete the i p.
     *
     * @param  \App\User  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function delete(User $user, IP $iP)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the i p.
     *
     * @param  \App\User  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function restore(User $user, IP $iP)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the i p.
     *
     * @param  \App\User  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function forceDelete(User $user, IP $iP)
    {
        return true;
    }
}
