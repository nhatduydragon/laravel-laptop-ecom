<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'brand_id',
        'image',
        'price',
        'ram_id',
        'cpu_id',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function cpu(){
        return $this->belongsTo(CPU::class,'cpu_id','id');
    }

    public function ram(){
        return $this->belongsTo(Ram::class,'ram_id','id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'id_product','id');
    }

    public function comments(){
        return $this->hasMany(Order::class,'id_product','id');
    }

}