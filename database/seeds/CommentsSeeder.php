<?php

use Illuminate\Database\Seeder;
use App\Comments;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comments::class, 50)->create()->each(function($comment){
        	$comment->post_id = rand(1, 20);
			$comment->save();
		});
    }
}
