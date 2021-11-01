<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable; 

    // protected $fillable = ['title','excerpt','body'];//yang diisi
    protected $guarded = ['id'];//yang tidak diisi
    protected $with = ['category','author']; //eager load

    //filtering result for searched post
    public function scopeFilter($query, array $filters){
    //using isset
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     $query->where('title','like','%' . $filters['search'] . '%')
        //           ->orWhere('body','like','%' . $filters['search'] . '%')
        //           ->orWhere('excerpt', 'like', '%' . $filters['search'] . '%');
        // }

    //using when method
        //search for all
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title','like','%' . $search . '%')
                         ->orWhere('body','like','%' . $search . '%');
        });

        //search include category
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        //search include uthor
        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
