<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'noInvoice',
        'idUser',
        'idBarang',
        'kategoriBarang',
        'namaBarang',
        'totalHarga',
        'jumlahBarang',
        'alamat',
        'kodePos',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function idBarang(){
        return $this->belongsTo(Barang::class);
    }
}
