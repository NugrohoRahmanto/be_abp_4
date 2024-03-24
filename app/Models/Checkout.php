<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';
    public $timestamps = false;

    protected $filllable = [
        'quantity'
    ];

    protected $primaryKey = ['idBooking', 'idMenu'];
    public $incrementing = false;

    protected $fillable = [
        'idMenu',
        'idBooking'
    ];
}
