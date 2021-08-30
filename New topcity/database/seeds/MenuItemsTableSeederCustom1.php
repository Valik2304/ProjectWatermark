<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeederCustom1 extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (file_exists(base_path('routes/web.php'))) {
            require base_path('routes/web.php');

            /*
            |--------------------------------------------------------------------------
            | Admin Menu
            |--------------------------------------------------------------------------
            */

            $menu = Menu::where('name', 'admin')->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Слайдер - 2',
                'url'     => '',
                'icon_class' => 'voyager-tv',
                'route'   => 'voyager.second-sliders.index',
            ]);

            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '',
//                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 10,
                ])->save();
            }
        }
    }
}
