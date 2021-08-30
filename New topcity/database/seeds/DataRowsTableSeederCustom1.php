<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeederCustom1 extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | Second Sliders
        |--------------------------------------------------------------------------
        */

        $secondSlidersDataType = DataType::where('slug', 'second-sliders')->firstOrFail();

        $dataRow = $this->dataRow($secondSlidersDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'hidden',
                'display_name' => 'Id',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($secondSlidersDataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'image',
                'display_name' => 'image',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($secondSlidersDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'created at',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($secondSlidersDataType, 'update_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => 'Update at',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 6,
            ])->save();
        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }
}
