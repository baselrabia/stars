<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provider_id')->unsigned()->default(null);
            $table->string('name');
            $table->longText('description');
            $table->date('publication_date');
            $table->time('time');
            $table->date('begin');
            $table->date('end');
            $table->date('envelope_opening');
            $table->string('video')->nullable();
            $table->string('attachment');
            $table->enum('type',['tender','auction','project']);
            $table->decimal('lng', 10, 7)->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->enum('priority',['on','off'])->default('off');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_deals');
    }
}
