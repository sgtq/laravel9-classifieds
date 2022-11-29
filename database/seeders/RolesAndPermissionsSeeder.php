<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create listings']);
        Permission::create(['name' => 'edit listings']);
        Permission::create(['name' => 'destroy listings']);
        Permission::create(['name' => 'create states']);
        Permission::create(['name' => 'edit states']);
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'edit cities']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'create subcategories']);
        Permission::create(['name' => 'edit subcategories']);
        Permission::create(['name' => 'delete subcategories']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('create listings');

        // or may be done by chaining
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'create listings', 'edit listings', 'destroy listings',
                'create countries', 'edit countries',
                'create states', 'edit states',
                'create cities', 'edit cities',
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
