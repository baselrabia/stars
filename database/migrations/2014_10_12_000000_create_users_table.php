<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('prefix',['Mr','Ms'])->nullable();
            $table->string('name');
            $table->string('mobile')->unique();
            $table->string('landline')->nullable();;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('lng', 10, 7)->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->enum('type',['user','admin','provider'])->default('user');
            //$table->boolean('is_premium')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'prefix' => 'Mr',
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(12345678),
            'mobile' => '0113110850',
            'type' => 'admin',
            'email_verified_at' => Carbon::now(),
          
        ]);

        DB::table('users')->insert([
            'prefix' => 'Mr',
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make(12345678),
            'mobile' => '0113110851',
            'type' => 'user',
            'email_verified_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'prefix' => 'Mr',
            'name' => 'provider',
            'email' => 'provider@provider.com',
            'password' => Hash::make(12345678),
            'mobile' => '0113110852',
            'type' => 'user',
            'email_verified_at' => Carbon::now(),
        ]);

    }
  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
