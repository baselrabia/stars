<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePricingPlanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_plan_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pricing_plan_id')->unsigned();
            $table->string('locale')->index();

            $table->string('key');
            $table->text('value');

            $table->unique(['pricing_plan_id','locale']);
            $table->foreign('pricing_plan_id')->references('id')->on('pricing_plans')->onDelete('cascade');
       
        });
        DB::table('pricing_plan_translations')->insert([
            'pricing_plan_id'=> 1,
            'locale'=> 'ar',
            'key'=> 'مميز',
            'value'=> 'مميز',
           
        ]);
        DB::table('pricing_plan_translations')->insert([
            'pricing_plan_id'=> 1,
            'locale'=> 'en',
            'key'=> 'star',
            'value'=> 'star',
            
        ]);
        DB::table('pricing_plan_translations')->insert([
            'pricing_plan_id'=> 2,
            'locale'=> 'ar',
            'key'=> 'مجاني',
            'value'=> 'مجاني',
           
        ]);
        DB::table('pricing_plan_translations')->insert([
            'pricing_plan_id'=> 2,
            'locale'=> 'en',
            'key'=> 'Free',
            'value'=> 'Free',
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_plan_translations');
    }
}
