<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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
        for ($i = 1; $i <= 10; $i++) {
            DB::table('authors')->insert([
                'name' => $faker->name
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('owner')->insert([
                'id'=> $i,
                'name' => $faker->name
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
                DB::table('country')->insert([
                'id'=> $i,
                'name' => $faker->country
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
                DB::table('city')->insert([
                'id'=> $i,
                'name' => $faker->city,
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
    }
}
