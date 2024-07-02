<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'pharmacy_id',
        'user_id',
        'pharmacy_name',
        'medicine_name',
        'category',
        'price',
        'quantity',
        'earlyQuantity',
        'totalPrice',
        'status'
    ];
}
