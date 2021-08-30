<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'adminweb')->firstOrFail();

        User::updateOrCreate([
            'name'           => 'Admin Web',
            'email'          => 'adminweb@adminweb.com',
            'phone' => '234567',
            'password'       => bcrypt('password'),
            'remember_token' => str_random(60),
            'role_id'        => $role->id,
        ]);
    }
}
