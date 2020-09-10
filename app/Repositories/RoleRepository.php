<?php


namespace App\Repositories;

use App\Interfaces\RoleInterface;

class RoleRepository extends BaseRepository implements RoleInterface
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    public function findByName(string $name) : object
    {
        return new \stdClass();
    }

    public function givePermissionTo(PermissionRepository $permission) : object
    {
        return new \stdClass();
    }

    public function revokePermissionTo(PermissionRepository $permission) : object
    {
        return new \stdClass();
    }

    public function assignRoleToUser(UserRepository $user) : object
    {
        return new \stdClass();
    }

    public function removeRoleFromUser(UserRepository $user) : object
    {
        return new \stdClass();
    }
}
