<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // create role with guard_name
       $super_role        = Role::create(['name' => 'super_admin']);
       $admin_role        = Role::create(['name' => 'admin']);
       $user_role         = Role::create(['name' => 'user']);
       // create permission
       $specify_role_per  = Permission::create(['name' => 'specify role']);
       $show_user_per     = Permission::create(['name' => 'show user']);
       $delete_user_per   = Permission::create(['name' => 'delete user']);
       $restore_user_per  = Permission::create(['name' => 'restore user']);
       $forcedel_user_per = Permission::create(['name' => 'force delete user']);

       // give all permissions to super_admin
       $super_role->givePermissionTo(Permission::all());
       // give permission to admin
       $admin_role->givePermissionTo([$show_user_per,$delete_user_per,$restore_user_per]);

    }
}
