<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments_rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_id',
        'rate',
        'user_id'
    ];
}
