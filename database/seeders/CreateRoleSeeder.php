<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class CreateRoleSeeder extends Seeder
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

        // manage account
        Permission::create(['name' => 'view account']);
        Permission::create(['name' => 'register account']);
        Permission::create(['name' => 'update account']);
        Permission::create(['name' => 'delete account']);

        // manage patient
        Permission::create(['name' => 'view patient']);
        Permission::create(['name' => 'register patient']);
        Permission::create(['name' => 'update patient']);
        Permission::create(['name' => 'delete patient']);

        // assign users
        $medical = Role::create(['name' => 'medical']);
        $medical->givePermissionTo('view account');
        $medical->givePermissionTo('register account');
        $medical->givePermissionTo('update account');
        $medical->givePermissionTo('delete account');

        $medical->givePermissionTo('view patient');
        $medical->givePermissionTo('register patient');
        $medical->givePermissionTo('update patient');
        $medical->givePermissionTo('delete patient');

        $technician = Role::create(['name' => 'technician']);
        $technician->givePermissionTo('view account');
        $technician->givePermissionTo('register account');
        $technician->givePermissionTo('update account');
        $technician->givePermissionTo('delete account');

        $technician->givePermissionTo('view patient');
        $technician->givePermissionTo('register patient');
        $technician->givePermissionTo('update patient');
        $technician->givePermissionTo('delete patient');

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('view account');
        $admin->givePermissionTo('register account');
        $admin->givePermissionTo('update account');
        $admin->givePermissionTo('delete account');

        $admin->givePermissionTo('view patient');
        $admin->givePermissionTo('register patient');
        $admin->givePermissionTo('update patient');
        $admin->givePermissionTo('delete patient');



    }
}
