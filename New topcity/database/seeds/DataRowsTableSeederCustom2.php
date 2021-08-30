<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeederCustom2 extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        /*
        |--------------------------------------------------------------------------
        | News
        |--------------------------------------------------------------------------
        */

        $newsDataType = DataType::where('slug', 'news')->firstOrFail();

        $dataRow = $this->dataRow($newsDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'hidden',
                'display_name'   => 'Id',
                'required'       => 1,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 0,
                'add'            => 0,
                'delete'         => 0,
                'details'        => '',
                'order'          => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'news_category_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'text',
                'display_name'   => 'News Category Id',
                'required'       => 1,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'text',
                'display_name'   => 'title',
                'required'       => 1,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'excerpt');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'text_area',
                'display_name'   => 'excerpt',
                'required'       => 1,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'rich_text_box',
                'display_name'   => 'description',
                'required'       => 1,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'image',
                'display_name'   => 'image',
                'required'       => 1,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 6,
            ])->save();
        }


        $dataRow = $this->dataRow($newsDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'timestamp',
                'display_name'   => 'created at',
                'required'       => 0,
                'browse'         => 0,
                'read'           => 0,
                'edit'           => 0,
                'add'            => 0,
                'delete'         => 0,
                'details'        => '',
                'order'          => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'update_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'timestamp',
                'display_name'   => 'Update at',
                'required'       => 0,
                'browse'         => 0,
                'read'           => 0,
                'edit'           => 0,
                'add'            => 0,
                'delete'         => 0,
                'details'        => '',
                'order'          => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'seo_title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'text_area',
                'display_name'   => 'seo title',
                'required'       => 0,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'seo_description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'text_area',
                'display_name'   => 'seo description',
                'required'       => 0,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'seo_keywords');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'text_area',
                'display_name'   => 'seo keywords',
                'required'       => 0,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'        => '',
                'order'          => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($newsDataType, 'active');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'           => 'checkbox',
                'display_name'   => 'show',
                'required'       => 0,
                'browse'         => 1,
                'read'           => 1,
                'edit'           => 1,
                'add'            => 1,
                'delete'         => 1,
                'details'      => [
                    'on' => 'YES',
                    'off' => 'NO',
                ],
                'order'          => 9,
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
