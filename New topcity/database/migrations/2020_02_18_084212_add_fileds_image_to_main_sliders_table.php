<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiledsImageToMainSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_sliders', function (Blueprint $table) {
            $table->string('image_ru')->nullable();
            $table->string('image_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_sliders', function (Blueprint $table) {
            $table->dropColumn(['image_ru','image_en']);
        });
    }
}
