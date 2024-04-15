<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $filllable = [
        'nomorMeja',
        'jamAmbil',
        'totalHarga',
        'statusAmbil',
        'user_id'
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'checkouts', 'idBooking', 'idMenu');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
