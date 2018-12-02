<?php

use Illuminate\Database\Seeder;
use Faker\Factory AS Fake;
use App\TransferLog;
use App\User;

class TransferLogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = (new User)->all();
        $minUserId = $users->min('id');
        $maxUserId = $users->max('id');
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 1500; $i++) {
            $transfer = new App\TransferLog();
            $transfer->resource = $faker->url;
            $transfer->transferred = $faker->numberBetween($min = 1000, $max =999999999 );
            $transfer->user_id = $faker->numberBetween($min = $minUserId, $max = $maxUserId);
            $transfer->save();
        }
    }
    }

