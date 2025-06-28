<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::with(['barang', 'supplier', 'user'])
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();
        return view('transaksi.create', compact('barangs', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'barang_id' => 'required|exists:barangs,id_barang',
            'supplier_id' => 'nullable|exists:suppliers,id_supplier',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:1000',
        ]);

        // Check stock availability for outgoing transactions
        if ($request->jenis_transaksi === 'keluar') {
            $barang = Barang::find($request->barang_id);
            if ($barang->stok < $request->jumlah) {
                return back()->withInput()->withErrors([
                    'jumlah' => 'Stok tidak mencukupi. Stok tersedia: ' . $barang->stok
                ]);
            }
        }

        DB::transaction(function () use ($request) {
            // Create transaction
            Transaksi::create([
                'tanggal' => $request->tanggal,
                'jenis_transaksi' => $request->jenis_transaksi,
                'barang_id' => $request->barang_id,
                'supplier_id' => $request->supplier_id,
                'user_id' => Auth::id(),
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
            ]);

            // Update stock
            $barang = Barang::find($request->barang_id);
            if ($request->jenis_transaksi === 'masuk') {
                $barang->stok += $request->jumlah;
            } else {
                $barang->stok -= $request->jumlah;
            }
            $barang->save();
        });

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::with(['barang', 'supplier', 'user'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barangs = Barang::orderBy('nama_barang')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();
        return view('transaksi.edit', compact('transaksi', 'barangs', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'barang_id' => 'required|exists:barangs,id_barang',
            'supplier_id' => 'nullable|exists:suppliers,id_supplier',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:1000',
        ]);

        DB::transaction(function () use ($request, $transaksi) {
            // Revert previous stock changes
            $barang = Barang::find($transaksi->barang_id);
            if ($transaksi->jenis_transaksi === 'masuk') {
                $barang->stok -= $transaksi->jumlah;
            } else {
                $barang->stok += $transaksi->jumlah;
            }
            $barang->save();

            // Check stock availability for new transaction
            if ($request->jenis_transaksi === 'keluar') {
                $newBarang = Barang::find($request->barang_id);
                $availableStock = $newBarang->stok;
                
                // If same barang, add back the old amount
                if ($transaksi->barang_id == $request->barang_id && $transaksi->jenis_transaksi === 'masuk') {
                    $availableStock += $transaksi->jumlah;
                }
                
                if ($availableStock < $request->jumlah) {
                    throw new \Exception('Stok tidak mencukupi. Stok tersedia: ' . $availableStock);
                }
            }

            // Update transaction
            $transaksi->update([
                'tanggal' => $request->tanggal,
                'jenis_transaksi' => $request->jenis_transaksi,
                'barang_id' => $request->barang_id,
                'supplier_id' => $request->supplier_id,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
            ]);

            // Apply new stock changes
            $newBarang = Barang::find($request->barang_id);
            if ($request->jenis_transaksi === 'masuk') {
                $newBarang->stok += $request->jumlah;
            } else {
                $newBarang->stok -= $request->jumlah;
            }
            $newBarang->save();
        });

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        DB::transaction(function () use ($transaksi) {
            // Revert stock changes
            $barang = Barang::find($transaksi->barang_id);
            if ($transaksi->jenis_transaksi === 'masuk') {
                $barang->stok -= $transaksi->jumlah;
            } else {
                $barang->stok += $transaksi->jumlah;
            }
            $barang->save();

            $transaksi->delete();
        });

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus!');
    }
}
