<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTFakebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
//        for ($i = 1; $i <= 10; $i++) {
//            DB::table('authors')->insert([
//                'id'=> $i,
//                'name' => $faker->name
//            ]);
//        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('owner')->insert([
                'id'=> $i,
                'owner_name' => $faker->name
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
                DB::table('country')->insert([
                'id'=> $i,
                'country_name' => $faker->country
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
                DB::table('city')->insert([
                'id'=> $i,
                'city_name' => $faker->city,
                'country_id'=>$i
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('auditions')->insert([
                'id'=> $i,
                'city' => $i,
                'owner'=>$i
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('books')->insert([
                'book_name' => $faker->text(20),
                'author_id'=>rand(1,10),
                'year'=>rand(1,2019),
                'audition_id'=>rand(1,10)
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            DB::table('readers')->insert([
                'id'=> $i,
                'reader_name' => $faker->name,
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rateBook')->insert([
                'id'=> $i,
                'rate' => rand(1,10),
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('baseReader')->insert([
                'id_reader' => rand(1,10),
                'id_book'=>rand(1,10),
                'id_rate'=>rand(1,10)
            ]);
        }
    }
}
