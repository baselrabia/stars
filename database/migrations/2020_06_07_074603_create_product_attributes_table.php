<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index();
            $table->string('brand');
            $table->string('size');

            $table->string('shape');
            $table->integer('unit_length');
            $table->integer('number_of_certificates');

            $table->string('payment_term');
            $table->string('delivery_term');
            $table->string('delivery_date');

            $table->unsignedBigInteger('delivery_location');
            $table->unsignedBigInteger('shipment_location');
            $table->unsignedBigInteger('place_of_origin');

            $table->boolean('in_stock')->default(false);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
