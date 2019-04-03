<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurchaseLineItemsInvoiceForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_line_items', function (Blueprint $table) {
            $table->foreign('invoice_id')
                    ->references('id')->on('invoices');
            $table->foreign('product_id')
                    ->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_line_items', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->dropForeign(['product_id']);
        });
    }
}
