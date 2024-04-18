<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Add 'user_id' to the fillable array
        'pharmacyName',
        'medicineName',
        'medicineCategory',
        'medicinePrice',
        'pharmacyLocation',
        'prescription'
    ];
}
