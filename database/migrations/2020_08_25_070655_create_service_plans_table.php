<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServicePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('point');
            $table->timestamps();
        });
        DB::table('service_plans')->insert([
            'name' => 'products', 
            'point' => 10, 
         ]);
        DB::table('service_plans')->insert([
            'name' => 'jobs', 
            'point' => 10, 
         ]);
    DB::table('service_plans')->insert([
            'name' => 'events', 
            'point' => 10, 
         ]);
         DB::table('service_plans')->insert([
            'name' => 'neededs', 
            'point' => 10, 
         ]);
         DB::table('service_plans')->insert([
            'name' => 'businessDeals', 
            'point' => 10, 
         ]);
         DB::table('service_plans')->insert([
            'name' => 'brochures', 
            'point' => 10, 
         ]); 
          DB::table('service_plans')->insert([
            'name' => 'webinars', 
            'point' => 10, 
         ]);
           DB::table('service_plans')->insert([
            'name' => 'quotations', 
            'point' => 10, 
         ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_plans');
    }
}
