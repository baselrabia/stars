<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('businessType_id');
            $table->string('company_fullname')->nullable();
            $table->string('company_short_name')->nullable();
            $table->string('company_name_ar')->nullable();
            $table->integer('number_of_employees');
            $table->string('logo')->nullable();
            $table->boolean('certified')->default(false);
            $table->string('certification')->nullable();
            $table->string('commercial_register')->nullable();
            $table->string('video')->nullable();
            $table->string('portfolio')->nullable();
            $table->enum('priority',['on','off'])->default('off');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
