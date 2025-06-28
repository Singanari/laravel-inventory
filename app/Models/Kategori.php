<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'deskripsi'];
    public $timestamps = true;

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'id_kategori');
    }
}
