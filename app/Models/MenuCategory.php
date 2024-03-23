<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaMenuKategori'
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'pilih_category', 'idCategory', 'idMenu');
    }
}

