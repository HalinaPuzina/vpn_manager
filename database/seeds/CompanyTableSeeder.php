<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Company;

class CompanyTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
       
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
             $company = new Company();
             $company->name = $faker->company;
             $company->qouta = $faker->numberBetween($min = 1000000000000, $max =9999999999999 );
             $company->save();
        }
    }

}
