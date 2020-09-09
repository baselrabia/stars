<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePricingServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_service', function (Blueprint $table) {
            $table->unsignedBigInteger('pricing_plan_id')->index();
            $table->unsignedBigInteger('service_plan_id');
            $table->integer('count')->nullable();
            

            $table->foreign('pricing_plan_id')->references('id')->on('pricing_plans')->onDelete('cascade');
           

        });

        DB::table('pricing_service')->insert([
           'pricing_plan_id' => 1, 
           'service_plan_id' => 1, 
           'count' => 10, 
        ]);
        DB::table('pricing_service')->insert([
            'pricing_plan_id' => 1, 
            'service_plan_id' => 2, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 1, 
            'service_plan_id' => 3, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 1, 
            'service_plan_id' => 4, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 1, 
            'service_plan_id' => 5, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 1, 
            'service_plan_id' => 6, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 1, 
            'service_plan_id' => 7, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 1, 
            'service_plan_id' => 8, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 1, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 2, 
            'count' => 10, 
         ]); DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 3, 
            'count' => 10, 
         ]); DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 4, 
            'count' => 10, 
         ]); DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 5, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 6, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 7, 
            'count' => 10, 
         ]);
         DB::table('pricing_service')->insert([
            'pricing_plan_id' => 2, 
            'service_plan_id' => 8, 
            'count' => 10, 
         ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_service');
    }
}
