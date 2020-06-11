<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(['user_id'=>1, 'photo_id'=>1, 'title'=>'Mountains', 'body'=> 'Picture taken in the mountains']);
    }
}
