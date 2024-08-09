<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'Eromosele Okoudoh',
            'email' => 'eromosele.okoudoh@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Jude James',
            'email' => 'eromosele.okoudoh@yahoo.com',
        ]);
        User::factory(40)->create();

        $users = User::all()->shuffle();
        for($i=0; $i<200; $i++){
            Post::factory()->create([
                'user_id' => $users->random()->id
            ]);
        }
      
       // $posts = Post::all();

       foreach($users as $user){
        $posts = Post::inRandomOrder()->take(rand(6, 30))->get();
        foreach($posts as $post){
            Comment::factory()->create([
                'post_id' => $post->id,
                'user_id' => $user->id

            ]);
        }
       }
        
    }
}
