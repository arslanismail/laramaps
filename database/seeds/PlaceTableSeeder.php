<?php
use App\place;
use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
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

        for($i=0; $i<100; $i++){

            place::create([
                'place'=>$faker->city,
                 'type'=>$faker->name,
                'lat'=>$faker->unique()->latitude(31.5451 ,32.0),
                'lng'=>$faker->unique()->longitude( 74.329376 ,74.5),


            ]);

        }

    }
}
