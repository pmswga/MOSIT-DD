<?php

namespace App\Policies\main\storage;

use App\Models\Main\Storage\EmployeeFileModel;
use App\AccountModel;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EmployeeFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any employee file models.
     *
     * @param  \App\AccountModel  $user
     * @return mixed
     */
    public function viewAny(AccountModel $user)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::Storage)->isViewAny
            ? Response::allow()
            : Response::deny('Недостаточно прав');
    }

    /**
     * Determine whether the user can view the employee file model.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function view(AccountModel $user, EmployeeFileModel $employeeFileModel)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::Storage)->isView;
    }

    /**
     * Determine whether the user can create employee file models.
     *
     * @param  \App\AccountModel  $user
     * @return mixed
     */
    public function create(AccountModel $user)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::Storage)->isCreate;
    }

    /**
     * Determine whether the user can update the employee file model.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function update(AccountModel $user, EmployeeFileModel $employeeFileModel)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::Storage)->isUpdate;
    }

    /**
     * Determine whether the user can delete the employee file model.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function delete(AccountModel $user, EmployeeFileModel $employeeFileModel)
    {
        return $user->getAccountRightsOn(\App\Core\Constants\ListSubSystemConstants::Storage)->isDelete;
    }

    /**
     * Determine whether the user can restore the employee file model.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function restore(AccountModel $user, EmployeeFileModel $employeeFileModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the employee file model.
     *
     * @param  \App\AccountModel  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function forceDelete(AccountModel $user, EmployeeFileModel $employeeFileModel)
    {
        //
    }
}
