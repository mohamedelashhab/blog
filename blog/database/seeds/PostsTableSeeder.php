<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Comment;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function($user){
            $user->posts()->saveMany(factory(Post::class, 5)->create(['user_id'=>$user->id])->each(function($post){
            }));
        });

      


    }
}
