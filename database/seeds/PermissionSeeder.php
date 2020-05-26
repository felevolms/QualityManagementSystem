<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['guard_name' => 'web', 'name' => 'delete document']);
        Permission::create(['guard_name' => 'web', 'name' => 'delete version']);

        // Create roles and assign created permissions
        $this->createRole('admin');
        $this->createRole('user');
        $this->createRole('director');

        Role::findByName('director')->givePermissionTo([
            'delete document',
            'delete version'
        ]);
    }

    private function createRole($roleName) {
        Role::create([
            'guard_name' => 'web',
            'name' => $roleName
        ]);

        return Role::findByName($roleName, 'web');
    }
}
