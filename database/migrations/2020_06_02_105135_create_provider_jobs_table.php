<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provider_id')->index();;
            $table->string('title');
            $table->text('summary');
            $table->text('requirements');
            $table->string('person_name');
            $table->string('phone');
            $table->string('email');
            $table->string('location');
            $table->date('deadline');
            $table->string('link');
            $table->enum('priority',['on','off'])->default('off');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_jobs');
    }
}
