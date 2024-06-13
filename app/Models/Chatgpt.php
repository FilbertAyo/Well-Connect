<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatgpt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prompt',
        'response',
    ];
}
