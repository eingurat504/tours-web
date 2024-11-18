<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $role = new Role();
        $role->name = 'System Administrator';
        $role->save();

        $permission_ids = range(1, Permission::count());
        $role->permissions()->sync($permission_ids, true);

    }
}
