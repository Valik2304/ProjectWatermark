<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'products');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural'   => 'Products',
                'icon'                  => 'voyager-bag',
                'model_name'            => 'App\Models\Product',
                'policy_name'           => null,
                'controller'            => '\App\Http\Controllers\Voyager\ProductsController',
                'generate_permissions'  => 1,
                'description'           => '',
                'server_side'           => 1,
            ])->save();
        }

        $dataType = $this->dataType('slug', 'coupons');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'coupons',
                'display_name_singular' => 'Coupon',
                'display_name_plural'   => 'Coupons',
                'icon'                  => 'voyager-dollar',
                'model_name'            => 'App\Models\Coupon',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'category');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'category',
                'display_name_singular' => 'Category',
                'display_name_plural'   => 'Categories',
                'icon'                  => 'voyager-tag',
                'model_name'            => 'App\Models\Category',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

//        $dataType = $this->dataType('name', 'category-product');
//        if (!$dataType->exists) {
//            $dataType->fill([
//                'slug'                  => 'category-product',
//                'display_name_singular' => 'Category Product',
//                'display_name_plural'   => 'Category Products',
//                'icon'                  => 'voyager-categories',
//                'model_name'            => 'App\CategoryProduct',
//                'controller'            => '',
//                'generate_permissions'  => 1,
//                'description'           => '',
//            ])->save();
//        }

        $dataType = $this->dataType('name', 'orders');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'orders',
                'display_name_singular' => 'Order',
                'display_name_plural' => 'Orders',
                'icon' => 'voyager-documentation',
                'model_name' => 'App\Models\Order',
                'controller' => '\App\Http\Controllers\Voyager\OrdersController',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('name', 'vacancies');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'vacancies',
                'display_name_singular' => 'Vacancy',
                'display_name_plural' => 'Vacancies',
                'icon' => 'voyager-receipt',
                'model_name' => 'App\Models\Vacancy',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('name', 'main_sliders');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'main-sliders',
                'display_name_singular' => 'Main Slider',
                'display_name_plural' => 'Main Sliders',
                'icon' => 'voyager-tv',
                'model_name' => 'App\Models\MainSlider',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('name', 'news');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'news',
                'display_name_singular' => 'News',
                'display_name_plural' => 'News',
                'icon' => 'voyager-news',
                'model_name' => 'App\Models\News',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('name', 'news_categories');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'news-categories',
                'display_name_singular' => 'News Category',
                'display_name_plural' => 'News Categories',
                'icon' => 'voyager-categories',
                'model_name' => 'App\Models\NewsCategory',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('name', 'team_members');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'team-members',
                'display_name_singular' => 'Team Member',
                'display_name_plural' => 'Team Members',
                'icon' => 'voyager-people',
                'model_name' => 'App\Models\TeamMember',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
