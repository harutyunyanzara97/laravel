<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply_transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'reply_id',
    ];
}
