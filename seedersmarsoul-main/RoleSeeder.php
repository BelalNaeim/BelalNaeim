<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Traits\PermissionTrait;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    use PermissionTrait;

    private $roles = [
        ['name' => 'مدير عام'],
        ['name' => 'مستخدم'],
    ];
    public function run()
    {
        foreach ($this->roles as $role) {
            Role::create($role);
        }

        $adminRole = Role::first();

        $superPermissions = $this->getAll();
        foreach ($superPermissions as $superPermission) {
            foreach ($superPermission['childrens'] as $permission) {
                Permission::create([
                    'name' => $permission,
                    'role_id' => $adminRole->id
                ]);
            }
        }
    }
}
