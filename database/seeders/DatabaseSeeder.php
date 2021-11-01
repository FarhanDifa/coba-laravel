<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::create([
                'name'=>'M Farhan Difa Izzati',
                'username'=>'kohan',
                'email'=>'kohan@gmail.com',
                'password'=>bcrypt('12345')
            ]);

        User::factory(3)->create();
        
        Category::create([
            'name'=>'Web Programming',
            'slug'=>'web-programming',
        ]);

        Category::create([
            'name'=>'Web Design',
            'slug'=>'web-design',
        ]);

        Category::create([
            'name'=>'Personal',
            'slug'=>'personal',
        ]);

        Post::factory(30)->create();

        // Post::create([
        //     'title'=>'Judul Pertama',
        //     'slug'=>'judul-pertama',
        //     'excerpt'=>'Lorem ipsum Pertama',
        //     'body'=>'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum fugiat adipisci veniam quia exercitationem reiciendis, neque officiis minima quasi molestias. Enim doloremque dolore sint veritatis esse hic totam voluptates quam.</p>
        //     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nam excepturi similique! Error reiciendis illum voluptate cupiditate, animi officia eius ducimus tempore deserunt, aut sint veritatis. Error repellat reiciendis assumenda porro sequi tenetur maiores accusamus, et dolor tempora? Vel labore saepe eveniet. Harum porro repudiandae aperiam beatae velit, maxime nobis neque, quam eaque aut modi ad voluptates atque tempore. In a exercitationem est libero, repellat cum tempore molestias alias ducimus quis possimus fugiat vitae accusantium, nostrum harum. Nisi eos voluptas accusamus iure modi facere sequi repellat, pariatur officia dolor similique cumque ex eum error veniam minus? Nobis voluptas omnis a.</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
    }
}
