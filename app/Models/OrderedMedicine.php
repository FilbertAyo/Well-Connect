<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PharmacyOrder;

class OrderedMedicine extends Model
{
    use HasFactory;


    protected $fillable = [

        'id',
        'pharmacy_order_id',
        'medicineName',
        'medicineCategory',
        'medicinePrice',
    ];

    public function orders(){
        return $this->belongsTo(PharmacyOrder::class);
     }
}
