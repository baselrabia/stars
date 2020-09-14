<?php

use App\Models\Ads;
use App\Models\Brochure;
use App\Models\BusinessDeal;
use App\Models\Event;
use App\Models\Needed;
use App\Models\NewReport;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Webinar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // DB::truncate();

        factory(ProductAttribute::class, 11)->create();
       //factory(App\models\EventTranslation::class, 10)->create();
      // factory(App\models\BusinessTypeTranslation::class, 10)->create();

    }
}
