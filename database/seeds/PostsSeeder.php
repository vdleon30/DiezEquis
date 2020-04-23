<?php

use Illuminate\Database\Seeder;
use App\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Posts::class, 20)->create()->each(function($post){
        	$post->user_id = rand(1, 10);
			$post->save();
		});
    }
}
