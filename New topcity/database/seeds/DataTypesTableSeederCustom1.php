<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeederCustom1 extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('name', 'second_sliders');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug' => 'second-sliders',
                'display_name_singular' => 'Second Slider',
                'display_name_plural' => 'Second Sliders',
                'icon' => 'voyager-tv',
                'model_name' => 'App\Models\SecondSlider',
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
