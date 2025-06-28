# Panduan Instalasi Sistem Inventaris Gudang

## Persyaratan Sistem

- PHP 8.2 atau lebih tinggi
- Composer
- MySQL 8.0 atau PostgreSQL 12
- Node.js dan NPM (untuk asset compilation)

## Langkah-langkah Instalasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd tugasakhir
```

### 2. Install Dependencies PHP
```bash
composer install
```

### 3. Install Dependencies Node.js (Opsional)
```bash
npm install
```

### 4. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventaris_gudang
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 6. Buat Database
```bash
# Untuk MySQL
mysql -u root -p
CREATE DATABASE inventaris_gudang;
exit;

# Atau gunakan phpMyAdmin untuk membuat database
```

### 7. Jalankan Migration
```bash
php artisan migrate
```

### 8. Jalankan Seeder (Data Awal)
```bash
php artisan db:seed
```

### 9. Set Permission Storage (Linux/Mac)
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### 10. Jalankan Development Server
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Akun Default

Setelah menjalankan seeder, Anda dapat login dengan:
- **Email**: `admin@inventaris.com`
- **Password**: `password`

## Fitur yang Tersedia

### Dashboard
- Statistik total kategori, supplier, barang, dan transaksi
- Aksi cepat untuk menambah data baru
- Monitoring stok menipis
- Daftar transaksi terbaru

### Manajemen Kategori
- Tambah, edit, hapus kategori
- Validasi data kategori
- Proteksi penghapusan kategori yang masih memiliki barang

### Manajemen Supplier
- Tambah, edit, hapus supplier
- Informasi lengkap supplier
- Proteksi penghapusan supplier yang masih memiliki transaksi

### Manajemen Barang
- Tambah, edit, hapus barang
- Pengelolaan stok dan stok minimum
- Status stok (Aman, Menipis, Habis)
- Relasi dengan kategori

### Manajemen Transaksi
- Transaksi masuk dan keluar
- Otomatis update stok
- Validasi stok untuk transaksi keluar
- Tracking user yang melakukan transaksi
- Relasi dengan supplier

## Troubleshooting

### Error "Class not found"
```bash
composer dump-autoload
```

### Error "Permission denied" pada storage
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Error database connection
- Pastikan database sudah dibuat
- Periksa konfigurasi di file `.env`
- Pastikan service database berjalan

### Error "No application encryption key"
```bash
php artisan key:generate
```

## Struktur Folder Penting

```
tugasakhir/
├── app/
│   ├── Http/Controllers/     # Controller aplikasi
│   └── Models/              # Model database
├── database/
│   ├── migrations/          # File migration
│   └── seeders/            # File seeder
├── resources/
│   └── views/              # File view Blade
└── routes/
    └── web.php             # Route aplikasi
```

## Backup dan Restore

### Backup Database
```bash
# MySQL
mysqldump -u root -p inventaris_gudang > backup.sql

# PostgreSQL
pg_dump inventaris_gudang > backup.sql
```

### Restore Database
```bash
# MySQL
mysql -u root -p inventaris_gudang < backup.sql

# PostgreSQL
psql inventaris_gudang < backup.sql
```

## Support

Jika mengalami masalah, silakan:
1. Periksa log error di `storage/logs/laravel.log`
2. Pastikan semua persyaratan sistem terpenuhi
3. Coba jalankan `php artisan config:clear` dan `php artisan cache:clear` 