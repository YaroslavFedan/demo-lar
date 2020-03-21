<?php


use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::truncate();

        $admin_permission = Permission::where('slug','full-access')->first();
        $user_permission = Permission::where('slug', 'edit-profile')->first();

        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Administrator';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'Application User';
        $user_role->save();
        $user_role->permissions()->attach($user_permission);

    }
}
