<?php

namespace App\Policies\main\storage;

use App\Models\Main\Storage\EmployeeFileModel;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EmployeeFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any employee file models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->getAccountRightsBy(\App\Core\Constants\ListSubSystem::Storage)->isViewAny
            ? Response::allow()
            : Response::deny('Недостаточно прав');
    }

    /**
     * Determine whether the user can view the employee file model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function view(User $user, EmployeeFileModel $employeeFileModel)
    {
        return $user->getAccountRightsBy(\App\Core\Constants\ListSubSystem::Storage)->isView;
    }

    /**
     * Determine whether the user can create employee file models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getAccountRightsBy(\App\Core\Constants\ListSubSystem::Storage)->isCreate;
    }

    /**
     * Determine whether the user can update the employee file model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function update(User $user, EmployeeFileModel $employeeFileModel)
    {
        return $user->getAccountRightsBy(\App\Core\Constants\ListSubSystem::Storage)->isUpdate;
    }

    /**
     * Determine whether the user can delete the employee file model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function delete(User $user, EmployeeFileModel $employeeFileModel)
    {
        return $user->getAccountRightsBy(\App\Core\Constants\ListSubSystem::Storage)->isDelete;
    }

    /**
     * Determine whether the user can restore the employee file model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function restore(User $user, EmployeeFileModel $employeeFileModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the employee file model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Main\Storage\EmployeeFileModel  $employeeFileModel
     * @return mixed
     */
    public function forceDelete(User $user, EmployeeFileModel $employeeFileModel)
    {
        //
    }
}
