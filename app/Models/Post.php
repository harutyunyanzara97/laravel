<?php

namespace App\Models;

use App\Models\Follow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    protected $fillable = [
        'title',
        'details',
        'description',
        'hashtags',
        'per_post_rate',
        'url',
        'location',
        'start_date',
        'end_date',
        'user_id',
        'files',
        'category_id',
        'images'
    ];



    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    public function countComments()
    {
        return count($this->comments);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
