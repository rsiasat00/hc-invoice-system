<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('order_date')->nullable();
            $table->unsignedInteger('invoice_id')->nullable();
            $table->unsignedInteger('products_id')->nullable();
            $table->integer('quantity')->default(0);
            
            $table->timestamps();

            $table->foreign('invoice_id')
                    ->references('id')->on('invoices');
            
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
            $table->dropForeign(['invoice_id']);
        });
        Schema::dropIfExists('orders');
    }
}
