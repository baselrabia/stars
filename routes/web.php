<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Jobs\SendEmailJob;
use App\Mail\EmailForQueuing;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function (Faker $faker) {
   $location = DB::table('Ads_location')->get()->toArray();
   dd($location[0]->location);
});

Route::get('emailtest', function () {

    $user = User::find(4);

    SendEmailJob::dispatch($user, new EmailForQueuing($user));
    // Mail::to($user)->send(new EmailForQueuing($user));

    dd('done');
});
