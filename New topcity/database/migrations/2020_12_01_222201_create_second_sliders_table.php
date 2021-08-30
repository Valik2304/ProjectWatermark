<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');

            $table->timestamps();
        });

          Artisan::call('db:seed', array('--class' => 'DataTypesTableSeederCustom1','--force'=>true));
          Artisan::call('db:seed', array('--class' => 'DataRowsTableSeederCustom1','--force'=>true));
          Artisan::call('db:seed', array('--class' => 'MenuItemsTableSeederCustom1','--force'=>true));
          Artisan::call('db:seed', array('--class' => 'PermissionsTableSeederCustom1','--force'=>true));
          Artisan::call('db:seed', array('--class' => 'PermissionRoleTableSeeder','--force'=>true));
          Artisan::call('db:seed', array('--class' => 'PermissionRoleTableSeederCustom','--force'=>true));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('second_sliders');
    }
}
