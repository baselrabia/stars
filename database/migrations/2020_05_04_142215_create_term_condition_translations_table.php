<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermConditionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_condition_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('term_condition_id')->unsigned();
            $table->string('locale')->index();

            $table->text('content');

            $table->unique(['term_condition_id','locale']);
            $table->foreign('term_condition_id')->references('id')->on('term_conditions')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('term_condition_translations');
    }
}
