<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderedMedicine;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class PharmacyOrder extends Model
{
    use HasFactory;

    use SoftDeletes;

    use Notifiable;

    protected $dates = ['deleted_at'];
    protected $table = 'pharmacy_orders';
    protected $primary_key = 'id';

    protected $fillable = [
        'pharmacy_id',
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
        return $this->hasMany(OrderedMedicine::class , 'pharmacy_order_id','user_id');
    }
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }
}
