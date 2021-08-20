<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Follow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rateable;

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

    public function rates()
    {
        return $this->hasMany(Rates_post::class, 'leader_id','rater_id');
    }

    public function isHelpful() {

        return $this->hasMany(Rates_post::class, 'leader_id')->where('leader_id', $this->id)->where("title","helpful");
    }

//    public function isFence()
//    {
//        return $this->hasMany(Rates_post::class, 'leader_id')->where('leader_id', $this->id)->where("title", "inflammatory");
//
//    }

    public function isUnHelpful() {

        return $this->hasMany(Rates_post::class, 'leader_id')->where('leader_id', $this->id)->where("title","calculated");
    }

    public function transactions()
    {
        return $this->hasMany(Post_transaction::class, 'post_id');
    }

    public function isBought()
    {
        return $this->hasMany(Post_transaction::class, 'post_id')->where('post_id', $this->id);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class,'post_id');
    }

}
