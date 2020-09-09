<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // table bid_management - product - 
        Schema::create('bidManagement_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->index();      
            $table->bigInteger('bid_management_id')->unsigned()->index();

            $table->tinyInteger('quantities')->nullable();
            $table->float('price')->nullable();

            $table->primary(['bid_management_id','product_id']);
            $table->unique(['bid_management_id','product_id']);

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
        Schema::dropIfExists('bid_product_provider_quotation');
    }
}
