<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $filllable = [
        'kodeDiskon',
        'persentaseDiskon',
        'quantityDiskon',
        'deskripsiDiskon',
        'shop_id'
    ];

    public function shop(){
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
