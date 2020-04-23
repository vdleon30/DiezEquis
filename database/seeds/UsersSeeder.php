<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		"name" => "Administrador",
    		"email" => "admin@admin.com",
    		"password" => bcrypt('admin1234'),
    	]);
       	factory(User::class, 10)->create()->each(function($user){
			$user->save();
		});
    }
}
