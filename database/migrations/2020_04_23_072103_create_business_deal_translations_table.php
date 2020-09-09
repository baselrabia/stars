<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDealTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_deal_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('business_deal_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->longText('description');

            $table->unique(['business_deal_id','locale']);
            $table->foreign('business_deal_id')->references('id')->on('business_deals')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_deal_translations');
    }
}
