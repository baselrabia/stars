<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderWebinarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_webinar', function (Blueprint $table) {
            $table->bigInteger('webinar_id')->unsigned()->index();
            $table->bigInteger('provider_id')->unsigned()->index();

            $table->primary(['provider_id', 'webinar_id']);
            $table->unique(['provider_id', 'webinar_id']);

            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_webinar');
    }
}
