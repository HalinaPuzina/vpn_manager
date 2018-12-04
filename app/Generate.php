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
        $startDay = Carbon::createFromDate($endDay->year, $endDay->month, 1)->addMonth(-6);        
        $period = \Carbon\CarbonPeriod::create($startDay, '1 day', $endDay);
        $faker = Fake::create();
        foreach ($period as $key => $date) {
            $users->each(function (User $user) use ($date, $faker) {
                $records = random_int(1, 5);
                for ($i = 1; $i <= $records; $i++) {
                    $transfer = new TransferLog();
                    $transfer->resource = $faker->url;
                    $transfer->transferred = $faker->numberBetween($min = 100, $max = 999999999999);
                    $transfer->user_id = $user->id;
                    $transfer->created_at = $date;
                    $transfer->save();
                }
            });
        }
    }

}
