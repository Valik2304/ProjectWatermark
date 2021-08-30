<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('DataTypesTableSeeder');
        $this->seed('DataTypesTableSeederCustom');
        $this->seed('DataRowsTableSeeder');
        $this->seed('DataRowsTableSeederCustom');
        $this->seed('MenusTableSeeder');
        $this->seed('MenusTableSeederCustom');
        $this->seed('MenuItemsTableSeeder');
        $this->seed('MenuItemsTableSeederCustom');
        $this->seed('RolesTableSeeder');
        $this->seed('RolesTableSeederCustom');
        $this->seed('PermissionsTableSeeder');
        $this->seed('PermissionsTableSeederCustom');
        $this->seed('PermissionRoleTableSeeder');
        $this->seed('PermissionRoleTableSeederCustom');
        $this->seed('SettingsTableSeeder');
        $this->seed('SettingsTableSeederCustom');
        $this->seed('UsersTableSeeder');
        $this->seed('UsersTableSeederCustom');

    }
}
