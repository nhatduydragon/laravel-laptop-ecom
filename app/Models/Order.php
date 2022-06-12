<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_user',
        'amount',
        'total',
        'status',
        'phone',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'id_product','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}