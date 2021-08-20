<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rates_answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'rater_id',
        'leader_id',
        'title'
    ];

}
