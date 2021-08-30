<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Permission::generateFor('products');

        Permission::generateFor('coupons');

        Permission::generateFor('category');

        Permission::generateFor('orders');

        Permission::generateFor('news');

        Permission::generateFor('news_categories');

        Permission::generateFor('vacancies');

        Permission::generateFor('team_members');

        Permission::generateFor('main_sliders');
    }
}
