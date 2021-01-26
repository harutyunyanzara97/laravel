<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Follow;

class Category extends Model
{
    protected $fillable = [
        'name','page_title','description','img_url'
    ];
    use HasFactory;

    public function posts(){
        return $this->hasMany('posts','category_id','id');
    }
    public function followers()
    {
        return $this->belongsToMany('follow','follows');
    }

    public function getFollowersCount()
    {
        return count($this->followers);
    }

}
