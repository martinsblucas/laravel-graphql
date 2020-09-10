<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{

    use WithFaker;

    public function testCreate()
    {
        $roleName = 'super-admin';
        $guardName = 'api';

        $this->expectException(RoleAlreadyExists::class);
        $role = Role::create(['guard_name' => $guardName, 'name' => $roleName]);
        $this->assertIsInt($role->id);
    }

    public function testFindByName() {
        $superAdminRole = Role::findByName('super-admin', 'api');
        $this->assertNotNull($superAdminRole->getAttribute('name'));
    }

    public function testGivePermissionTo() {
        $superAdminRole = Role::findByName('super-admin', 'api');
        $permissionGiven = $superAdminRole->givePermissionTo(['view users']);
        $this->assertIsInt($permissionGiven->getAttribute('id'));
    }

    public function testRevokePermissionTo() {
        $roleName = $this->faker->userName;
        $permissionName = $this->faker->userName;

        $role = Role::create(['guard_name' => 'api', 'name' => $roleName]);
        $testRole = Role::findByName($role->getAttribute('name'), $role->getAttribute('guard_name'));

        $permission = Permission::create(['guard_name' => 'api', 'name' => $permissionName]);
        $testPermission = Permission::findByName($permission->getAttribute('name'), $permission->getAttribute('guard_name'));

        $permissionRevoked = $testRole->revokePermissionTo($testPermission->getAttribute('name'));

        $this->assertIsInt($permissionRevoked->getAttribute('id'));
    }
}
