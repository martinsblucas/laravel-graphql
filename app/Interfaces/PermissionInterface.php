<?php


namespace App\Interfaces;

use App\Repositories\RoleRepository;

interface PermissionInterface extends BaseInterface
{
    public function findByName(string $name) : object;

    public function assignRole(RoleRepository $role) : object;

    public function removeRole(RoleRepository $role) : object;

    public function userCan(array $permissionsNames) : bool;
}
