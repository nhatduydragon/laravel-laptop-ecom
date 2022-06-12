<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dungluongram',
    ];

    public function products(){
        return $this->hasMany(Product::class,'ram_id','id');
    }
}