<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_type_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('business_type_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->longText('description');

            $table->unique(['business_type_id','locale']);
            $table->foreign('business_type_id')->references('id')->on('business_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_type_translations');
    }
}
