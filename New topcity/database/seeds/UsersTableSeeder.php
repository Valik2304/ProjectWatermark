<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();

        User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '234567',
            'password' => bcrypt(config('voyager.adminPassword')),
            'remember_token' => str_random(60),
            'role_id' => $role->id,
        ]);

    }
}
