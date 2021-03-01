<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'files',
        'comment_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function user()
    {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

//    public function likes()
//    {
//        return $this->hasMany(Like::class, 'reply_id');
//    }

    public function replies()
    {
        return $this->hasMany(Answer::class, 'reply_id');
    }
}
