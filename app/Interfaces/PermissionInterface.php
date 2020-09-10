<?php


namespace App\Interfaces;

interface PermissionInterface extends BaseInterface
{
    public function findByName(string $name) : object;

    public function assignRole(RoleInterface $role) : object;

    public function removeRole(RoleInterface $role) : object;

    public function userCan(array $permissionsNames) : object;
}
