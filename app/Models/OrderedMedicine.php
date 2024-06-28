<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedMedicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'pharmacy_id',

        'pharmacy_order_id',
        'medicineName',
        'medicineCategory',
        'medicinePrice',
    ];

    public function orders(){
        return $this->belongsTo(PharmacyOrder::class);
     }

     public function pharmacy()
     {
         return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
     }
}
