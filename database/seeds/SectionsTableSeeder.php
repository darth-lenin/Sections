<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 100; $i++) {
            DB::table('sections')->insert([
                'user_id' => rand(1, 100),
                'img_logo' => str_random(10) . '.jpg',
                'img' => str_random(10) . '.jpg',
                'info' => $faker->text($maxNbChars = 300),
            ]);
        }
    }
}