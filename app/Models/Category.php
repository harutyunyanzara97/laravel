<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Follow;

class Category extends Model
{
    protected $fillable = [
        'name','page_title','description','img_url','comment_id','user_id'
    ];
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class,'category_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'category_id');
    }
    public function followers()
    {
        return $this->hasMany(Follow::class, 'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function getFollowersCount()
    {
        return count($this->followers);
    }

}
