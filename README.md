# Sistem Inventaris Gudang

Sistem manajemen inventaris gudang yang dibangun dengan Laravel 11 dan Tailwind CSS.

## Fitur Utama

### 1. Manajemen Kategori
- CRUD (Create, Read, Update, Delete) kategori barang
- Validasi data kategori
- Proteksi penghapusan kategori yang masih memiliki barang terkait

### 2. Manajemen Supplier
- CRUD supplier
- Informasi lengkap supplier (nama, alamat, telepon, email)
- Proteksi penghapusan supplier yang masih memiliki transaksi terkait

### 3. Manajemen Barang
- CRUD barang dengan kategori
- Pengelolaan stok dan stok minimum
- Validasi data barang
- Proteksi penghapusan barang yang masih memiliki transaksi terkait

### 4. Manajemen Transaksi
- Transaksi masuk dan keluar
- Otomatis update stok barang
- Validasi stok untuk transaksi keluar
- Tracking user yang melakukan transaksi
- Relasi dengan supplier untuk transaksi masuk

### 5. Dashboard
- Statistik total kategori, supplier, barang, dan transaksi
- Aksi cepat untuk menambah data baru
- Monitoring stok menipis
- Daftar transaksi terbaru

### 6. Autentikasi
- Login dan register user
- Proteksi route dengan middleware auth
- Session management

## Instalasi

1. Clone repository
```bash
git clone <repository-url>
cd tugasakhir
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database di file `.env`

5. Jalankan migration dan seeder
```bash
php artisan migrate
php artisan db:seed
```

6. Jalankan development server
```bash
php artisan serve
```

## Akun Default

Setelah menjalankan seeder, Anda dapat login dengan:
- Email: `admin@inventaris.com`
- Password: `password`

## Struktur Database

### Tabel Users
- id (primary key)
- name
- email
- password
- timestamps

### Tabel Kategoris
- id_kategori (primary key)
- nama_kategori
- deskripsi
- timestamps

### Tabel Suppliers
- id_supplier (primary key)
- nama_supplier
- alamat
- no_telepon
- email
- timestamps

### Tabel Barangs
- id_barang (primary key)
- nama_barang
- kategori_id (foreign key)
- satuan
- stok
- stok_minimum
- deskripsi
- timestamps

### Tabel Transaksis
- id_transaksi (primary key)
- tanggal
- jenis_transaksi (enum: masuk, keluar)
- barang_id (foreign key)
- supplier_id (foreign key, nullable)
- user_id (foreign key)
- jumlah
- keterangan
- timestamps

## Relasi Database

- User → Transaksi (one-to-many)
- Kategori → Barang (one-to-many)
- Supplier → Transaksi (one-to-many)
- Barang → Transaksi (one-to-many)

## Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel built-in auth

## Kontribusi

1. Fork repository
2. Buat branch fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## Lisensi

MIT License
