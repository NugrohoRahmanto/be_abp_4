<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihCategory extends Model
{
    use HasFactory;

    protected $table = 'pilih_category';
    public $timestamps = false;

    protected $primaryKey = ['idCategory', 'idMenu'];
    public $incrementing = false;

    protected $fillable = [
        'idCategory',
        'idMenu'
    ];
}
