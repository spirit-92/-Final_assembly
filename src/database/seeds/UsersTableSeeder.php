<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i1 = 1; $i1 <= 100; $i1++) {
            DB::table('users')->insert([
                'id'=> $i1,
                'username' => Str::random(10, 'alpha')
            ]);
            for ($i = 1; $i <= 10; $i++) {
                DB::table('list_of_reviews')->insert([
                    'user_id' => $i1,
                    'review'=>Str::random(10, 'alpha')
                ]);
            }
        }
    }
}
