<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategoriBarang',
        'namaBarang',
        'hargaBarang',
        'jumlahBarang',
        'fotoBarang',
    ];

    public function idUser(){
        return $this->belongsTo(Faktur::class);
    }
}
