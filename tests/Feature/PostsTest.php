<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use App\Posts;

class PostsTest extends TestCase
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
        $response->assertStatus(302);

        // Read post
        $post=Posts::where("title","Probando Test")->first();
        $response=$this->actingAs($admin)->get('/posts');
        $response->assertStatus(200);

        // Update post
        $response=$this->actingAs($admin)->post('/posts/update', ['_token'=>csrf_token(),'id'=>$post->id, 'title'=>'Probando Test', 'body'=>'PRUEBA']);
        $response->assertStatus(302);

        // Delete post
        $response=$this->actingAs($admin)->get('/posts/destroy/'.$post->id);
        $response->assertStatus(302);

    }
}
