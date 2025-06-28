@extends('layout')
@section('title', 'Detail Kategori')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Kategori</h2>
        <div class="space-x-2">
            <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                Edit
            </a>
            <a href="{{ route('kategori.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Kembali
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">ID Kategori</label>
                <p class="text-lg text-gray-900">{{ $kategori->id_kategori }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Nama Kategori</label>
                <p class="text-lg text-gray-900">{{ $kategori->nama_kategori }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <p class="text-lg text-gray-900">{{ $kategori->deskripsi ?? 'Tidak ada deskripsi' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Tanggal Dibuat</label>
                <p class="text-lg text-gray-900">{{ $kategori->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Terakhir Diupdate</label>
                <p class="text-lg text-gray-900">{{ $kategori->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection 