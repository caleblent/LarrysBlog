<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category'];

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter();
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query
                ->where('title', 'like', '%' . $search . '%'));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
