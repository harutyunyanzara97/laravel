<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'user_id',
        'to_id',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function seller()
    {
        return $this->belongsTo(User::class, 'to_id');
    }
}
