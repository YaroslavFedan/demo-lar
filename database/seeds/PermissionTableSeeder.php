<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();

        $admin_role = Role::where('slug','admin')->first();
        $user_role = Role::where('slug', 'user')->first();

        $all = new Permission();
        $all->slug = 'full-access';
        $all->name = 'Full access';
        $all->save();
        $all->roles()->attach($admin_role);

        $editProfile = new Permission();
        $editProfile->slug = 'edit-profile';
        $editProfile->name = 'Edit Profile';
        $editProfile->save();
        $editProfile->roles()->attach($user_role);

    }
}
