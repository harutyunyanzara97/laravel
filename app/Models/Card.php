<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'card_number',
        'cvc',
        'user_id',
        'exp_month',
        'exp_year',
        'brand'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
