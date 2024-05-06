<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderedMedicine;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
         'id',
        'patient_name',
        'pat_street',
        'pat_district',
        'pat_city',
        'contact',
    ];

    public function orderedMedicine(){
        return $this->hasMany(OrderedMedicine::class , 'order_id','id');
    }

}
