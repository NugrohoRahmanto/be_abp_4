<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaToko',
        'nomorToko',

        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount(){
        return $this->hasMany(Discount::class, 'shop_id', 'id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
