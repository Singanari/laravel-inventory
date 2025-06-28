@extends('layout')
@section('title', 'Detail Transaksi')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Transaksi</h2>
        <div class="space-x-2">
            <a href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                Edit
            </a>
            <a href="{{ route('transaksi.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Kembali
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Transaksi</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">ID Transaksi</label>
                        <p class="text-lg text-gray-900">{{ $transaksi->id_transaksi }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tanggal</label>
                        <p class="text-lg text-gray-900">{{ $transaksi->tanggal->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Jenis Transaksi</label>
                        <div class="mt-1">
                            @if($transaksi->jenis_transaksi === 'masuk')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Barang Masuk
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Barang Keluar
                                </span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Jumlah</label>
                        <p class="text-lg text-gray-900">{{ $transaksi->jumlah }}</p>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Detail Barang & Supplier</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Barang</label>
                        <p class="text-lg text-gray-900">{{ $transaksi->barang->nama_barang }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Kategori Barang</label>
                        <p class="text-lg text-gray-900">{{ $transaksi->barang->kategori->nama_kategori }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Supplier</label>
                        <p class="text-lg text-gray-900">{{ $transaksi->supplier->nama_supplier ?? 'Tidak ada supplier' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">User</label>
                        <p class="text-lg text-gray-900">{{ $transaksi->user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Keterangan</h3>
            <p class="text-lg text-gray-900">{{ $transaksi->keterangan ?? 'Tidak ada keterangan' }}</p>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Sistem</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Tanggal Dibuat</label>
                    <p class="text-lg text-gray-900">{{ $transaksi->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Terakhir Diupdate</label>
                    <p class="text-lg text-gray-900">{{ $transaksi->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 