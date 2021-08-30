<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUpdateToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'billing_province',
                'billing_postalcode',
                'billing_name_on_card',
                'billing_discount',
                'billing_discount_code',
                'billing_subtotal',
                'billing_tax',
                'payment_gateway',
                'shipped',
                'error'
            ]);

            $table->string('billing_email')->nullable(false)->change();
            $table->string('billing_name')->nullable(false)->change();
            $table->string('billing_city')->nullable(false)->change();
            $table->string('billing_address')->nullable(false)->change();
            $table->string('billing_phone')->nullable(false)->change();

            $table->longText('content');


            $table->unsignedBigInteger('order_payment_id')->nullable();

            $table->foreign('order_payment_id')->references('id')->on('order_payments')
                ->onUpdate('cascade')->onDelete('set null');


            $table->unsignedBigInteger('order_status_id')->nullable();

            $table->foreign('order_status_id')->references('id')->on('order_statuses')
                ->onUpdate('cascade')->onDelete('set null');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
