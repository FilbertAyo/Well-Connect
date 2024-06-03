<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Add 'user_id' to the fillable array
        'pharmacy_id',
        'pharmacyName',
        'medicineName',
        'medicineCategory',
        'medicinePrice',
        'pharmacyLocation',
    ];
}
