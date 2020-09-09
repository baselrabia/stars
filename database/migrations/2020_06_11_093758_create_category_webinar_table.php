<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryWebinarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_webinar', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->index();
            $table->bigInteger('webinar_id')->unsigned()->index();
          
            
            $table->primary(['category_id', 'webinar_id']);
            $table->unique(['category_id', 'webinar_id']);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_webinar');
    }
}
