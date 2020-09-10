<?php


namespace App\Interfaces;

use App\Repositories\PermissionRepository;
use App\Repositories\UserRepository;

interface RoleInterface extends BaseInterface
{
    public function findByName(string $name) : object;

    public function givePermissionTo(PermissionRepository $permission) : object;

    public function revokePermissionTo(PermissionRepository $permission) : object;

    public function assignRoleToUser(UserRepository $user) : object;

    public function removeRoleFromUser(UserRepository $user) : object;
}
