<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalProductQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_product_quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quotation_id')->unsigned()->index();
            $table->string('name');
            $table->string('category_id');
            $table->Integer('quantity')->nullable();
            $table->timestamps();

            
            $table->unique('quotation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_product_quotations');
    }
}
