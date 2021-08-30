<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSiemensFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['images','quantity']);
            $table->dropUnique('products_name_unique');
            $table->string('article')->unique()->after('name');
            $table->text('details')->nullable(false)->change();
            $table->text('description')->nullable()->change();
            $table->integer('price')->default(0)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('images')->nullable()->after('image');
            $table->unique('name');
            $table->dropColumn('article');
        });
    }
}
