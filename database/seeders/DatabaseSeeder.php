<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::truncate();
        Post::truncate();
        Category::truncate();

        // Post::factory()->create();


        $user = User::factory()->create([
            'name' => 'Dummy Boi',
            'email' => 'dummy@me.io',
        ]);

        $lifestyle = Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle'
        ]);

        $technology = Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);

        $business = Category::create([
            'name' => 'Business',
            'slug' => 'business'
        ]);

        Post::create([
            "category_id" => $lifestyle->id,
            "user_id" => $user->id,
            "slug" => "lifestyle-post",
            "title" => "Lifestyle Post",
            "excerpt" => "Excerpt from the first post",
            "body" => "<p>Lorem ipsum and et cetera, insert other miscellaneous test post info here.</p>"
        ]);

        Post::create([
            "category_id" => $technology->id,
            "user_id" => $user->id,
            "slug" => "technology-post",
            "title" => "Technology Post",
            "excerpt" => "Excerpt from the second post",
            "body" => "<p>Lorem ipsum and et cetera, insert other miscellaneous test post info here.</p>"
        ]);

        Post::create([
            "category_id" => $business->id,
            "user_id" => $user->id,
            "slug" => "business-post",
            "title" => "Business Post",
            "excerpt" => "Excerpt from the third post",
            "body" => "<p>Lorem ipsum and et cetera, insert other miscellaneous test post info here.</p>"
        ]);

        Post::create([
            "category_id" => $business->id,
            "user_id" => $user->id,
            "slug" => "business-post-2",
            "title" => "Business Business Post",
            "excerpt" => "Excerpt from the fourth post",
            "body" => "<p>Lorem ipsum and et cetera, insert other miscellaneous test post info here.</p>"
        ]);

        Post::create([
            "category_id" => $lifestyle->id,
            "user_id" => $user->id,
            "slug" => "life-must-have-style",
            "title" => "Life Must Have Style",
            "excerpt" => "Excerpt from the fifth post",
            "body" => "<p>Lorem ipsum and et cetera, insert other miscellaneous test post info here.</p>"
        ]);

        Post::create([
            "category_id" => $technology->id,
            "user_id" => $user->id,
            "slug" => "newest-tech",
            "title" => "Newest Tech",
            "excerpt" => "Excerpt from the sixth post",
            "body" => "<p>Lorem ipsum and et cetera, insert other miscellaneous test post info here.</p>"
        ]);


    }
}
