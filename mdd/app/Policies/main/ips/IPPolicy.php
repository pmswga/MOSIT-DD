<?php

namespace App\Policies;

use App\Models\Main\IP\IPModel;
use App\AccountModel;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class IPPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any i p s.
     *
     * @param  \App\AccountModel  $user
     * @return mixed
     */
    public function viewAny(AccountModel $user)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystem::IPS)->isViewAny
            ? Response::allow()
            : Response::deny('Недостаточно прав');
    }

    /**
     * Determine whether the user can view the i p.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function view(AccountModel $user, IPModel $iP)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystem::IPS)->isView;
    }

    /**
     * Determine whether the user can create i p s.
     *
     * @param  \App\AccountModel  $user
     * @return mixed
     */
    public function create(AccountModel $user)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystem::IPS)->isCreate;
    }

    /**
     * Determine whether the user can update the i p.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function update(AccountModel $user, IPModel $iP)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystem::IPS)->isUpdate
            ? Response::allow()
            : Response::deny('Недостаточно прав');
    }

    /**
     * Determine whether the user can delete the i p.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function delete(AccountModel $user, IPModel $iP)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystem::IPS)->isDelete;
    }

    /**
     * Determine whether the user can restore the i p.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function restore(AccountModel $user, IPModel $iP)
    {
        return true;

    }

    /**
     * Determine whether the user can permanently delete the i p.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\IP  $iP
     * @return mixed
     */
    public function forceDelete(AccountModel $user, IPModel $iP)
    {
        return true;
    }
}