<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeededsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neededs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provider_id')->unsigned()->default(null);
            $table->enum('type',['distributers','brokers','agents']);
            $table->longText('summary');
            $table->longText('requirements');
            $table->string('person_name');
            $table->string('phone');
            $table->string('email');
            $table->string('landline');
            $table->string('location');
            $table->string('image');
            $table->string('link');
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
        Schema::dropIfExists('neededs');
    }
}
