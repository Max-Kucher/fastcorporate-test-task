<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enum\Users\Permissions\Permissions;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);

        foreach (Permissions::cases() as $permission) {
            $permissionModel = Permission::create(['name' => $permission->value]);

            $roleAdmin->givePermissionTo($permissionModel);
        }
    }
}
