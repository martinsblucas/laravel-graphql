<?php


namespace App\Repositories;

use App\Interfaces\PermissionInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository implements PermissionInterface
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    public function findByName(string $name) : object
    {
        return new \stdClass();
    }

    public function assignRole(RoleRepository $role) : object
    {
        return new \stdClass();
    }

    public function removeRole(RoleRepository $role) : object
    {
        return new \stdClass();
    }

    public function userCan(array $permissionsNames) : bool
    {
        return true;
    }
}
