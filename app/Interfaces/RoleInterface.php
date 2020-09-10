<?php


namespace App\Interfaces;

interface RoleInterface extends BaseInterface
{
    public function findByName(string $name) : object;

    public function givenPermissionTo(PermissionInterface $permission) : object;

    public function revokePermissionTo(PermissionInterface $permission) : object;

    public function assignRoleToUser(UserInterface $user) : object;

    public function removeRoleFromUser(UserInterface $user) : object;
}
