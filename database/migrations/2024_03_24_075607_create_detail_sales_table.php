<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sales', function (Blueprint $table) {
            $table->id();
            // Change product_id to a JSON type to store an array of product IDs
            $table->bigInteger('sale_id');
            $table->json('product_id');
            // Add a qty field that will also use the JSON type to store an array of quantities
            $table->json('qty');
            $table->string('total_produk');
            $table->string('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_sales');
    }
};
