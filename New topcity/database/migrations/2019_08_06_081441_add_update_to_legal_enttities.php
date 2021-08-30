<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdateToLegalEnttities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legal_entities', function (Blueprint $table) {
            $table->dropColumn(['full_name','itn']);
            $table->string('inn')->after('id');
            $table->string('first_name')->after('email');
            $table->string('last_name')->after('first_name');;
            $table->string('patronymic_name')->nullable()->after('last_name');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('legal_entities', function (Blueprint $table) {
            $table->string('full_name');
            $table->dropColumn(['first_name','last_name','patronymic_name']);
        });
    }
}
