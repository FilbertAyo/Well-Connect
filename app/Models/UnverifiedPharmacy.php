<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnverifiedPharmacy extends Model
{
    use HasFactory;
    protected $fillable=[
        'pharmacyName',
        'street',
        'region',
        'city',
        'contact',
        'certification',
        'un_pharmacy_image',
        'pharmacyEmail',
        'status'
    ];
}
