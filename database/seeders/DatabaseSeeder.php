<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $vrlab = Category::create([
            'name'=>'virtual reality lab',
            'slug'=>'vrlab'
        ]);
        $fablab =  Category::create([
            'name'=>'Fabrication lab',
            'slug'=>'fablab'
        ]);
        $datalab = Category::create([
            'name'=>'Data lab',
            'slug'=>'datalab'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$vrlab->id,
            'title'=>'vr lab',
            'slug'=>'vrlab',
            'excerpt'=>'lorem ipsum',
            'body'=>'lorem ipsum dollar sit amet conetc'
        ]);
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$fablab->id,
            'title'=>'fab lab',
            'slug'=>'fablab',
            'excerpt'=>'lorem ipsum',
            'body'=>'lorem ipsum dollar sit amet conetc'
        ]);
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$datalab->id,
            'title'=>'datalab',
            'slug'=>'datalab',
            'excerpt'=>'lorem ipsum',
            'body'=>'lorem ipsum dollar sit amet conetc'
        ]);


    }
}
