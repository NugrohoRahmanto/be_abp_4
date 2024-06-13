<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 
        'shop_id', 
        'menu_id',
        'banyakPesanan', 
        'statusMasak'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
