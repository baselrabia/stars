<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinar_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('webinar_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('summary');
            $table->text('description');

            $table->unique(['webinar_id','locale']);
            $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinar_translations');
    }
}
