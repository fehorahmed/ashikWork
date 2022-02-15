<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    function supplier(){
        return $this->hasOne(Supplier::class,'id','supplier_id');
    }
    function details(){
        return $this->hasMany(OrderDetails::class);
    }
}
