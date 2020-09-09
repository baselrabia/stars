<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_quotation', function (Blueprint $table) {
            $table->bigInteger('provider_id')->unsigned()->index();
            $table->bigInteger('quotation_id')->unsigned()->index();
          
            $table->enum('status',['Viewed','Accepted','Rejected','No Actions Yet'])->default('No Actions Yet');

            $table->primary(['provider_id', 'quotation_id']);
            $table->unique(['provider_id', 'quotation_id']);

            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_quotation');
    }
}
