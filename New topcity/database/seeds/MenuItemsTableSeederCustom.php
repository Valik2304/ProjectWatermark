<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeederCustom extends Seeder
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
                'title'   => 'Dashboard',
                'url'     => '',
                'route'   => 'voyager.dashboard',
            ]);

            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-boat',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();


            $catalogMenuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Catalog',
                'url'     => '',
                'route'   => '',
            ]);

            $catalogMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-archive',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Products',
                'url'     => '/admin/products',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-bag',
                    'color'      => null,
                    'parent_id'  => $catalogMenuItem->id,
                    'order'      => 1,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Categories',
                'url'     => '/admin/category',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-tag',
                    'color'      => null,
                    'parent_id'  => $catalogMenuItem->id,
                    'order'      => 2,
                ])->save();
            }

            $UsersAndRolesMenuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Users And Roles',
                'url'     => '',
            ]);
            if (!$UsersAndRolesMenuItem->exists) {
                $UsersAndRolesMenuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-pirate',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 3,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Users',
                'url'     => '',
                'route'   => 'voyager.users.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-person',
                    'color'      => null,
                    'parent_id'  => $UsersAndRolesMenuItem->id,
                    'order'      => 1,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Roles',
                'url'     => '',
                'route'   => 'voyager.roles.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-lock',
                    'color'      => null,
                    'parent_id'  => $UsersAndRolesMenuItem->id,
                    'order'      => 2,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'Main Sliders',
                'url' => '',
                'route' => 'voyager.main-sliders.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-tv',
                    'color' => null,
                    'parent_id' => null,
                    'order' => 4,
                ])->save();
            }

            $newsConfigMenuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'News Config',
                'url' => '',
                'route' => '',
            ]);
            if (!$newsConfigMenuItem->exists) {
                $newsConfigMenuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-treasure',
                    'color' => null,
                    'parent_id' => null,
                    'order' => 5,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'News',
                'url' => '',
                'route' => 'voyager.news.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-news',
                    'color' => null,
                    'parent_id' => $newsConfigMenuItem->id,
                    'order' => 1,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'News Categories',
                'url' => '',
                'route' => 'voyager.news-categories.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-categories',
                    'color' => null,
                    'parent_id' => $newsConfigMenuItem->id,
                    'order' => 2,
                ])->save();
            }


            $aboutAsMenuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'About As',
                'url' => '',
                'route' => '',
            ]);
            if (!$aboutAsMenuItem->exists) {
                $aboutAsMenuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-company',
                    'color' => null,
                    'parent_id' => null,
                    'order' => 6,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'Team Members',
                'url' => '',
                'route' => 'voyager.team-members.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-people',
                    'color' => null,
                    'parent_id' => $aboutAsMenuItem->id,
                    'order' => 1,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'Vacancies',
                'url' => '',
                'route' => 'voyager.vacancies.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-receipt',
                    'color' => null,
                    'parent_id' => $aboutAsMenuItem->id,
                    'order' => 2,
                ])->save();
            }



            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'Orders',
                'url' => '/admin/orders',
                'route' => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => 'voyager-documentation',
                    'color' => null,
                    'parent_id' => null,
                    'order' => 10,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Coupons',
                'url'     => '/admin/coupons',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-dollar',
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 11,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Media',
                'url'     => '',
                'route'   => 'voyager.media.index',
            ]);

            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();


            $toolsMenuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Tools',
                'url'     => '',
            ]);

            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 8,
            ])->save();


            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Settings',
                'url'     => '',
                'route'   => 'voyager.settings.index',
            ]);

            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-settings',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 9,
            ])->save();


            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Menu Builder',
                'url'     => '',
                'route'   => 'voyager.menus.index',
            ]);

            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-list',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 1,
            ])->save();


            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Database',
                'url'     => '',
                'route'   => 'voyager.database.index',
            ]);

            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-data',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 2,
            ])->save();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'BREAD',
                'url'     => '',
                'route'   => 'voyager.bread.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => 'voyager-bread',
                    'color'      => null,
                    'parent_id'  => $toolsMenuItem->id,
                    'order'      => 3,
                ])->save();
            }


            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Compass',
                'url'     => '',
                'route'   => 'voyager.compass.index',
            ]);

            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-compass',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 4,
            ])->save();

            /*
            |--------------------------------------------------------------------------
            | Main Menu
            |--------------------------------------------------------------------------
            */

            $menu = Menu::where('name', 'main')->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Shop',
                'url'     => '',
                'route'   => 'shop.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 1,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'About',
                'url'     => '#',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 2,
                ])->save();
            }


            /*
            |--------------------------------------------------------------------------
            | Footer Menu
            |--------------------------------------------------------------------------
            */

            $menu = Menu::where('name', 'footer')->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Follow Me:',
                'url'     => '',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 1,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'fa-globe',
                'url'     => 'http://andremadarang.com',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 2,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'fa-youtube',
                'url'     => 'http://youtube.com/drehimself',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 2,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'fa-github',
                'url'     => 'http://github.com/drehimself',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 2,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'fa-twitter',
                'url'     => 'http://twitter.com/drehimself',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 2,
                ])->save();
            }



            /*
            |--------------------------------------------------------------------------
            | User-Cabinet Menu
            |--------------------------------------------------------------------------
            */

            $menu = Menu::where('name', 'user-cabinet')->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Кошик',
                'url'     => '#',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 1,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Історія замовлень',
                'url'     => '',
                'route'   => 'orders.index',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 2,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Профіль',
                'url'     => 'users.edit',
                'route'   => null,
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 3,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Юридичні особи',
                'url'     => '',
                'route'   => 'legal-person.create',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 4,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Адреса доставки',
                'url'     => '',
                'route'   => 'delivery-address.create',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 5,
                ])->save();
            }

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Меню специфікації',
                'url'     => '#',
                'route'   => '',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 6,
                ])->save();
            }
            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title'   => 'Ваші ЗІПи',
                'url'     => '#',
                'route'   => '',
            ]);
            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target'     => '_self',
                    'icon_class' => null,
                    'color'      => null,
                    'parent_id'  => null,
                    'order'      => 7,
                ])->save();
            }
        }
    }
}
