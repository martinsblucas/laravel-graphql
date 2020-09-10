<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;

class PermissionTest extends TestCase
{

    use WithFaker;

    public function testCreate()
    {
        $this->expectException(PermissionAlreadyExists::class);
        $role = Permission::create(['guard_name' => 'api', 'name' => 'view users']);
        $this->assertIsInt($role->id);
    }

    public function testFindByName() {
        $viewUsersPermission = Permission::findByName('view users', 'api');
        $this->assertNotNull($viewUsersPermission->getAttribute('name'));
    }

    public function testGivePermissionTo() {
        $viewUsersPermission = Permission::findByName('view users', 'api');
        $assignedRole = $viewUsersPermission->assignRole(['super-admin']);
        $this->assertIsInt($assignedRole->getAttribute('id'));
    }

    public function testRemoveRole() {
        $roleName = $this->faker->userName;
        $permissionName = $this->faker->userName;

        $role = Role::create(['guard_name' => 'api', 'name' => $roleName]);
        $testRole = Role::findByName($role->getAttribute('name'), $role->getAttribute('guard_name'));

        $permission = Permission::create(['guard_name' => 'api', 'name' => $permissionName]);
        $testPermission = Permission::findByName($permission->getAttribute('name'), $permission->getAttribute('guard_name'));

        $removedRole = $testPermission->removeRole($testRole);

        $this->assertIsInt($removedRole->getAttribute('id'));
    }
}
