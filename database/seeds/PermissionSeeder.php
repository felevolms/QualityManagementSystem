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

        // Create roles and assign created permissions
        $this->createRole('admin');
        $this->createRole('it');
        $this->createRole('hr');
        $this->createRole('tech');
        $this->createRole('director_it');
        $this->createRole('director_hr');
        $this->createRole('director_tech');
    }

    private function createRole($roleName) {
        Role::create([
            'guard_name' => 'web',
            'name' => $roleName
        ]);

        return Role::findByName($roleName, 'web');
    }
}
