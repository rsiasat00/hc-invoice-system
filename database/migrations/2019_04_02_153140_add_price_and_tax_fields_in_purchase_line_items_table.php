<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceAndTaxFieldsInPurchaseLineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_line_items', function (Blueprint $table) {
            $table->decimal("price", 8,2)->default(0.00);
            $table->decimal("tax", 8,2)->default(0.00);
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
            $table->dropColumn(['price', 'tax']);
        });
    }
}
