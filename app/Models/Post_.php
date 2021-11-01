<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
{
    private static $blog_posts = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Kohan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Itaque molestias, ut rem assumenda distinctio maxime? Odit in, 
            dolor harum deleniti voluptates placeat neque animi, dolores, 
            velit voluptate assumenda beatae dignissimos."
        ],
    
        [
            "title" => "Judul Kedua Kohan",
            "slug" => "judul-post-kedua",
            "author" => "Farhan",
            "body" => "WKWKWKWKWKWKWKWKW Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Itaque molestias, ut rem assumenda distinctio maxime? Odit in, 
            dolor harum deleniti voluptates placeat neque animi, dolores, 
            velit voluptate assumenda beatae dignissimos."
        ],
    ];

    public static function all()
    {
        return collect( self::$blog_posts); 
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach($posts as $item){
        //     if($item["slug"] === $slug){
        //         $post = $item;
        //     }
        // }

        return $posts->firstWhere('slug',$slug);
    }
}
