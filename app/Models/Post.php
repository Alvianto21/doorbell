<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Sluggable;
    
    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'published_at',
        'author_id',
        'category_id'
    ];

    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    public function author()
    {
        return $this->belongsTo(User::class,);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, 
        fn($query,  $search) =>
            $query->where('title', 'like', '%'.$search.'%')
        );

        $query->when($filters['category'] ?? false,
        fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );
        
        $query->when($filters['author'] ?? false,
        fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );

    }

    /**
     * Get the route key name for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}
