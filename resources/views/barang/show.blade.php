@extends('layout')
@section('title', 'Detail Barang')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Barang</h2>
        <div class="space-x-2">
            <a href="{{ route('barang.edit', $barang->id_barang) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                Edit
            </a>
            <a href="{{ route('barang.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Kembali
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Barang</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">ID Barang</label>
                        <p class="text-lg text-gray-900">{{ $barang->id_barang }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Barang</label>
                        <p class="text-lg text-gray-900">{{ $barang->nama_barang }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Kategori</label>
                        <p class="text-lg text-gray-900">{{ $barang->kategori->nama_kategori }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Satuan</label>
                        <p class="text-lg text-gray-900">{{ $barang->satuan }}</p>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Stok & Status</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Stok Saat Ini</label>
                        <p class="text-lg text-gray-900">{{ $barang->stok }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Stok Minimum</label>
                        <p class="text-lg text-gray-900">{{ $barang->stok_minimum }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Status Stok</label>
                        <div class="mt-1">
                            @if($barang->stok <= $barang->stok_minimum)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Stok Habis
                                </span>
                            @elseif($barang->stok <= $barang->stok_minimum + 5)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Stok Menipis
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Stok Aman
                                </span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                        <p class="text-lg text-gray-900">{{ $barang->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Sistem</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Tanggal Dibuat</label>
                    <p class="text-lg text-gray-900">{{ $barang->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Terakhir Diupdate</label>
                    <p class="text-lg text-gray-900">{{ $barang->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 