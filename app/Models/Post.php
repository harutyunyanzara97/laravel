<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Follow;
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
        'category_id',
        'images'
    ];
    use HasFactory;

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }


}
