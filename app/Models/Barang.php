<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function Tipe()
    {
        return $this->belongsTo(Tipe::class, 'id_tipe');
    }

    protected $fillable = ['nama_produk', 'jumlah_produk', 'harga_produk', 'id_tipe',];
}
