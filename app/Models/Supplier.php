<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'id_supplier';
    protected $fillable = ['nama_supplier', 'alamat', 'no_telepon', 'email'];
    public $timestamps = true;

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'supplier_id', 'id_supplier');
    }
}
