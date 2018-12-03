<?php

namespace App;

use Faker\Factory AS Fake;
use Carbon\Carbon;
use App\TransferLog;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Generate extends Model
{

    //

    public static function run()
    {
        $users = (new User)->all();
        $endDay = Carbon::now();
        $startDay = Carbon::createFromDate($endDay->year, $endDay->month, $endDay->day)->addMonth(-6);
        //$period = \Carbon\CarbonPeriod::since($startDay)->days(1)->until($endDay);
        $period = \Carbon\CarbonPeriod::create($startDay, '1 day', $endDay);
        $dates = [];
        foreach ($period as $key => $date) {
            $dates[] = $date->format('Y-m-d H:i:s');
        }

        $faker = Fake::create();
        foreach ($dates as $key => $date) {
            $users->each(function (User $user) use ($date, $faker) {
                $records = random_int(50, 500);
                for ($i = 1; $i <= $records; $i++) {
                    $transfer = new TransferLog();
                    $transfer->resource = $faker->url;
                    $transfer->transferred = $faker->numberBetween($min = 1000, $max = 9999999);
                    $transfer->user_id = $user->id;
                    $transfer->created_at = $date;
                    $transfer->save();
                }
            });
        }
    }

}
