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
        'pharmacyEmail',
        'status'
    ];
}