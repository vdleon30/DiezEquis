<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use App\Posts;
use App\Comments;

class CommentsTest extends TestCase
{
     use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $admin=User::where("email","admin@admin.com")->first();
        if (!$admin) {
            User::seed();
            $admin=User::where("email","admin@admin.com")->first();
        }

        // Create post
        $response=$this->actingAs($admin)->post('/posts/save', ['_token'=>csrf_token(), 'title'=>'Probando Test', 'body'=>'PRUEBA']);

        // Read post
        $post=Posts::where("title","Probando Test")->first();
        $response=$this->actingAs($admin)->get('/posts');



        // Create comment
        $response=$this->actingAs($admin)->post('/comments/save', ['_token'=>csrf_token(), 'post_id'=>$post->id, 'body'=>'PRUEBA']);
        $response->assertStatus(302);

        $comment=$post->comments->first();

        // Delete comment
        $response=$this->actingAs($admin)->get('/comments/destroy/'.$comment->id);
        $response->assertStatus(302);

        // Delete post
        $response=$this->actingAs($admin)->get('/posts/destroy/'.$post->id);
        $response->assertStatus(302);


    }
}
