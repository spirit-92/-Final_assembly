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
        for ($i1 = 1; $i1 <= 10; $i1++) {
            DB::table('authors')->insert([
                'name' => $faker->name
            ]);
        }
        for ($i2 = 1; $i2 <= 10; $i2++) {
            DB::table('owner')->insert([
                'id'=> $i2,
                'name' => $faker->name
            ]);
        }
        for ($i3 = 1; $i3 <= 10; $i3++) {
                DB::table('country')->insert([
                'id'=> $i3,
                'name' => $faker->country
            ]);
        }
        for ($i4 = 1; $i4 <= 10; $i4++) {
                DB::table('city')->insert([
                'id'=> $i4,
                'name' => $faker->city,
                'country_id'=>$i4
            ]);
        }
        for ($i5 = 1; $i5 <= 10; $i5++) {
            DB::table('auditions')->insert([
                'id'=> $i5,
                'city' => $i5,
                'owner'=>$i5
            ]);
        }
    }
}
