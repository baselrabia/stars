<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quotation_id');
            $table->unsignedBigInteger('provider_id');
            $table->string('type');
            $table->string('payment_term');
            $table->string('delivery_term');
            $table->date('delivery_date');
            $table->Integer('delivery_location');
            $table->string('note')->nullable();
            $table->enum('status',['Viewed','Accepted','Rejected','No Actions Yet'])->default('No Actions Yet');
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
        Schema::dropIfExists('bid_management');
    }
}
