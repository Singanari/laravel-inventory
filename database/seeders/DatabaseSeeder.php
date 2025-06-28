<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@inventaris.com',
            'password' => Hash::make('password'),
        ]);

        // Create sample categories
        $kategoris = [
            ['nama_kategori' => 'Elektronik', 'deskripsi' => 'Barang-barang elektronik'],
            ['nama_kategori' => 'Pakaian', 'deskripsi' => 'Pakaian dan aksesoris'],
            ['nama_kategori' => 'Makanan', 'deskripsi' => 'Makanan dan minuman'],
            ['nama_kategori' => 'Peralatan', 'deskripsi' => 'Peralatan kantor dan rumah tangga'],
            ['nama_kategori' => 'Bahan Baku', 'deskripsi' => 'Bahan baku untuk produksi'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }

        // Create sample suppliers
        $suppliers = [
            [
                'nama_supplier' => 'PT Maju Jaya',
                'alamat' => 'Jl. Sudirman No. 123, Jakarta',
                'no_telepon' => '021-5550123',
                'email' => 'info@majujaya.com'
            ],
            [
                'nama_supplier' => 'CV Sukses Mandiri',
                'alamat' => 'Jl. Thamrin No. 456, Jakarta',
                'no_telepon' => '021-5550456',
                'email' => 'contact@suksesmandiri.com'
            ],
            [
                'nama_supplier' => 'UD Berkah Abadi',
                'alamat' => 'Jl. Gatot Subroto No. 789, Jakarta',
                'no_telepon' => '021-5550789',
                'email' => 'sales@berkahabadi.com'
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        // Create sample items
        $barangs = [
            [
                'nama_barang' => 'Laptop Asus',
                'kategori_id' => 1,
                'satuan' => 'Unit',
                'stok' => 15,
                'stok_minimum' => 5,
                'deskripsi' => 'Laptop Asus ROG Gaming'
            ],
            [
                'nama_barang' => 'Mouse Wireless',
                'kategori_id' => 1,
                'satuan' => 'Pcs',
                'stok' => 50,
                'stok_minimum' => 10,
                'deskripsi' => 'Mouse wireless Logitech'
            ],
            [
                'nama_barang' => 'Kemeja Pria',
                'kategori_id' => 2,
                'satuan' => 'Pcs',
                'stok' => 100,
                'stok_minimum' => 20,
                'deskripsi' => 'Kemeja pria formal'
            ],
            [
                'nama_barang' => 'Celana Jeans',
                'kategori_id' => 2,
                'satuan' => 'Pcs',
                'stok' => 75,
                'stok_minimum' => 15,
                'deskripsi' => 'Celana jeans pria dan wanita'
            ],
            [
                'nama_barang' => 'Beras Premium',
                'kategori_id' => 3,
                'satuan' => 'Kg',
                'stok' => 200,
                'stok_minimum' => 50,
                'deskripsi' => 'Beras premium kualitas tinggi'
            ],
            [
                'nama_barang' => 'Minyak Goreng',
                'kategori_id' => 3,
                'satuan' => 'Liter',
                'stok' => 150,
                'stok_minimum' => 30,
                'deskripsi' => 'Minyak goreng kelapa sawit'
            ],
            [
                'nama_barang' => 'Printer HP',
                'kategori_id' => 4,
                'satuan' => 'Unit',
                'stok' => 8,
                'stok_minimum' => 3,
                'deskripsi' => 'Printer HP LaserJet'
            ],
            [
                'nama_barang' => 'Kertas A4',
                'kategori_id' => 4,
                'satuan' => 'Rim',
                'stok' => 25,
                'stok_minimum' => 5,
                'deskripsi' => 'Kertas A4 80gsm'
            ],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }

        // Create sample transactions
        $transaksis = [
            [
                'tanggal' => now()->subDays(5),
                'jenis_transaksi' => 'masuk',
                'barang_id' => 1,
                'supplier_id' => 1,
                'user_id' => 1,
                'jumlah' => 10,
                'keterangan' => 'Pembelian awal laptop'
            ],
            [
                'tanggal' => now()->subDays(4),
                'jenis_transaksi' => 'masuk',
                'barang_id' => 2,
                'supplier_id' => 1,
                'user_id' => 1,
                'jumlah' => 30,
                'keterangan' => 'Pembelian mouse wireless'
            ],
            [
                'tanggal' => now()->subDays(3),
                'jenis_transaksi' => 'keluar',
                'barang_id' => 1,
                'supplier_id' => null,
                'user_id' => 1,
                'jumlah' => 2,
                'keterangan' => 'Penjualan ke customer'
            ],
            [
                'tanggal' => now()->subDays(2),
                'jenis_transaksi' => 'masuk',
                'barang_id' => 3,
                'supplier_id' => 2,
                'user_id' => 1,
                'jumlah' => 50,
                'keterangan' => 'Pembelian kemeja'
            ],
            [
                'tanggal' => now()->subDays(1),
                'jenis_transaksi' => 'masuk',
                'barang_id' => 5,
                'supplier_id' => 3,
                'user_id' => 1,
                'jumlah' => 100,
                'keterangan' => 'Pembelian beras'
            ],
        ];

        foreach ($transaksis as $transaksi) {
            Transaksi::create($transaksi);
        }
    }
}
