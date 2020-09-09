<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdsLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_location', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('location');
           
        });

       
        DB::table('ads_location')->insert([
        'name' => 'First Home Page',
        'location' => 'homePageUp',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Second Home Page',
            'location' => 'homePageDown',
       ]);

        DB::table('ads_location')->insert([
        'name' => 'Profile Page',
        'location' => 'profile',
        ]);  

        DB::table('ads_location')->insert([
            'name' => 'All Events Page',
            'location' => 'allEvent',
       ]);

        DB::table('ads_location')->insert([
        'name' => 'Show Event Page',
        'location' => 'showEvent',
        ]);  
        DB::table('ads_location')->insert([
            'name' => 'Create Event Page',
            'location' => 'createEvents',
       ]);

        DB::table('ads_location')->insert([
        'name' => 'All Products Page',
        'location' => 'allProducts',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Show Products Page',
            'location' => 'showProducts',
            ]);

      

        DB::table('ads_location')->insert([
            'name' => 'providers Page',
            'location' => 'allProvider',
            ]);   
            
        DB::table('ads_location')->insert([
            'name' => ' All Business Deals Page',
            'location' => 'allBusinessDeals',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Up Business Deals Page',
            'location' => 'showUpBusinessDeals',
        ]);
        DB::table('ads_location')->insert([
            'name' => ' Down Business Deals Page',
            'location' => 'showDownBusinessDeals',
        ]);

        DB::table('ads_location')->insert([
            'name' => 'Create Business Deals Page',
            'location' => 'CreateBusinessDeals',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'All Up Brochures Page',
            'location' => 'allUpBrochures',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'All Down Brochures Page',
            'location' => 'allDownBrochures',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'All Up Needed Page',
            'location' => 'allUpNeeded',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'All Down Needed Page',
            'location' => 'allDownNeeded',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Show Needed Page',
            'location' => 'showNeeded',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Create Needed Page',
            'location' => 'createNeeded',
        ]);

        //====================

        DB::table('ads_location')->insert([
            'name' => 'webinars Page',
            'location' => 'allWebinars',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Show Webinars Page',
            'location' => 'showWebinars',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Create Webinars Page',
            'location' => 'createWebinars',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Show Job Page',
            'location' => 'showjob',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Create Job Page',
            'location' => 'createjob',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Up News & Reports Page',
            'location' => 'upNewsReports',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Down News & Reports Page',
            'location' => 'downNewsReports',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Show First Up News & Reports Page',
            'location' => 'firstUpNewsReports',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Show Secound Up News & Reports Page',
            'location' => 'secoundUpNewsReports',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Show Down News & Reports Page',
            'location' => 'showDownNewsReports',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'About-Us Page',
            'location' => 'aboutUs',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Frequent Asked Questions Page',
            'location' => 'fq',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Privacy Policy Page',
            'location' => 'privacyPolicy',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Terms And Conditions Page',
            'location' => 'termsConditions',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Contact-Us Page',
            'location' => 'contactUs',
        ]);
        DB::table('ads_location')->insert([
            'name' => 'Advertisement Services Page',
            'location' => 'advertisementServices',
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_location');
    }
}
