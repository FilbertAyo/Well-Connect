<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderedMedicine;

class PharmacyOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id', // Add 'user_id' to the fillable array
        'pharmacyName',
        'medicineName',
        'medicineCategory',
        'medicinePrice',
        'pharmacyLocation',
        'prescription',
        'user_name' ,
        'user_email' ,
        'user_address'
    ];


    public function orderedMedicine(){
        return $this->hasMany(OrderedMedicine::class , 'order_id','id');
    }
}
