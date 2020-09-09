<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('locale')->unique();
            $table->enum('direction', ['ltr', 'rtl'])->default('ltr');
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('languages')->insert([
            'name' => 'العربية',
            'locale' => 'ar',
            'direction' => 'rtl',
        ]);
        DB::table('languages')->insert([
            'name' => 'English',
            'locale' => 'en',
            'direction' => 'ltr',
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
