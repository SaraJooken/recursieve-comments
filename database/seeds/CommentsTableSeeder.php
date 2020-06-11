<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert(['post_id'=>1, 'user_id'=>1, 'body'=>'Eerste comment']);

        $faker = Faker\Factory::create();

        for($tel = 2; $tel <= 50; $tel ++){
            DB::table('comments')->insert([
                'parent_id'=> $tel-1,
                'user_id' => $faker->numberBetween($min = 1, $max = 20),
                'body'=> $faker->text($maxNbChars = 200)
            ]);
        }
    }
}
