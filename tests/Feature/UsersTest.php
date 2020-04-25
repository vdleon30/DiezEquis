<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UsersTest extends TestCase
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
            $this->seed();
            $admin=User::where("email","admin@admin.com")->first();
        }

        // Create user
        $response=$this->actingAs($admin)->post('/users/save', ['_token'=>csrf_token(), 'name'=>'Administrador', 'email'=>'admin@post.com',"password" => 'adminpost','password_confirmation'=> 'adminpost']);
        $response->assertStatus(302);

        // Read user
        $user=User::where("email","admin@post.com")->first();
        $response=$this->actingAs($user)->get('/users');
        $response->assertStatus(200);

        // Update user
        $response=$this->actingAs($user)->post('/users/update', ['_token'=>csrf_token(), 'id'=>$user->id, 'name'=>'Administrador', 'email'=>'admin@post.com']);
        $response->assertStatus(302);

        // Delete user
        $response=$this->actingAs($user)->get('/users/destroy/'.$user->id);
        $response->assertStatus(302);
    }
}
