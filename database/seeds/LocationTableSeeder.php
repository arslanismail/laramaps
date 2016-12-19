<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker=Faker\Factory::create('ne_NP');

        for($i=0; $i<200; $i++){

            location::create([
                'name'=>$faker->name,
                'lat'=>$faker->unique()->latitude(31.5451 ,32.0),
                'lng'=>$faker->unique()->longitude( 74.329376 ,75.5),


            ]);

        }


    }
}
