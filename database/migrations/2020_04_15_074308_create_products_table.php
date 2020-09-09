<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provider_id')->unsigned()->default(null);
            $table->bigInteger('category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price_per_item');

            $table->float('price_lot_from');
            $table->float('price_lot_to');

            $table->integer('minimum_order')->default(1);
            $table->string('unit')->nullable();

            $table->string('attachment')->nullable();
            $table->string('video')->nullable();
            $table->enum('type',['machine' ,'tool']);
            $table->string('available');
            $table->enum('location',['home','market'])->default('market');
            $table->enum('priority',['on','off'])->default('off');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
