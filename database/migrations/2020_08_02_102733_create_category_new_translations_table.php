<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryNewTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_new_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_new_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['category_new_id', 'locale']);
            $table->foreign('category_new_id')->references('id')->on('category_news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_new_translations');
    }
}
