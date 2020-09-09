<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePricingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->text('value');
            $table->float('price')->nullable();
            $table->integer('day')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        DB::table('pricing_plans')->insert([
            'key'=> 'star',
            'value'=> 'star',
            'price'=> 100,
            'day'=> 30,
            'status'=> true,
            'created_at'=> Carbon::now(),
        ]);
        DB::table('pricing_plans')->insert([
            'key'=> 'Free',
            'value'=> 'Free',
            'price'=> 0,
            'day'=> 0,
            'status'=> true,
            'created_at'=> Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_plans');
    }
}
