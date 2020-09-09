<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_new_report_id')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('image');
            $table->enum('priority',['on','off'])->default('off')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('category_new_report_id')->references('id')->on('category_news')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_reports');
    }
}
