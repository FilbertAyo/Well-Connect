<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'user_id',
        'location',
        'distance',
        'image'
    ];
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
