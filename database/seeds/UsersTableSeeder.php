<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        $admin_role = Role::where('slug','admin')->first();
        $admin_perm = Permission::all();

        $admin = User::create([
            'name'=>env('ADMIN_NAME','Admin'),
            'email'=>env('ADMIN_EMAIL','admin@admin.com'),
            'password'=>Hash::make(env('ADMIN_PASSWORD','password')),
            'email_verified_at'=>\Carbon\Carbon::now()
        ]);

        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);
    }
}
