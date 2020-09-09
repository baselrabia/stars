<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeededTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needed_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('needed_id')->unsigned();
            $table->string('locale')->index();

            $table->longText('summary');
            $table->longText('requirements');

            $table->unique(['needed_id','locale']);
            $table->foreign('needed_id')->references('id')->on('neededs')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('needed_translations');
    }
}
