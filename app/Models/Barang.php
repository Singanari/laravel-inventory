<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'kategori_id', 'satuan', 'stok', 'stok_minimum', 'deskripsi'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'barang_id', 'id_barang');
    }
}
