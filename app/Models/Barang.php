<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'jumlah_produk',
        'id_tipe',
        'stok',
        'asal_daerah'
    ];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'id_tipe');
    }
}
