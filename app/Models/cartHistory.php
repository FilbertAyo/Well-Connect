<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'pharmacyName',
        'medicineName',
        'medicineCategory',
        'medicinePrice',
        'pharmacyLocation',
        // Add other fillable attributes here if necessary
    ];
}
