@extends('layout')
@section('title', 'Detail Supplier')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Supplier</h2>
        <div class="space-x-2">
            <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                Edit
            </a>
            <a href="{{ route('supplier.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Kembali
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Supplier</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">ID Supplier</label>
                        <p class="text-lg text-gray-900">{{ $supplier->id_supplier }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Supplier</label>
                        <p class="text-lg text-gray-900">{{ $supplier->nama_supplier }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Alamat</label>
                        <p class="text-lg text-gray-900">{{ $supplier->alamat }}</p>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Kontak</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">No. Telepon</label>
                        <p class="text-lg text-gray-900">{{ $supplier->no_telepon }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Email</label>
                        <p class="text-lg text-gray-900">{{ $supplier->email ?? 'Tidak ada email' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tanggal Dibuat</label>
                        <p class="text-lg text-gray-900">{{ $supplier->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Terakhir Diupdate</label>
                        <p class="text-lg text-gray-900">{{ $supplier->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 