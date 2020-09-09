<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrochureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brochure_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('brochure_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['brochure_id','locale']);
            $table->foreign('brochure_id')->references('id')->on('brochures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brochure_translations');
    }
}
