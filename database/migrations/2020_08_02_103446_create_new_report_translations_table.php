<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewReportTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_report_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('new_report_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->text('content');

            $table->unique(['new_report_id','locale']);
            $table->foreign('new_report_id')->references('id')->on('new_reports')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_report_translations');
    }
}
