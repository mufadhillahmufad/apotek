<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Menampilkan semua data obat.
     */
    public function index()
    {
        $obat = Obat::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil diambil',
            'data' => $obat
        ], 200);
    }

    /**
     * Menambahkan data obat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat',
            'nama_obat' => 'required',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_expired' => 'required|date'
        ]);

        $obat = Obat::create([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'stock_obat' => $request->stock_obat,
            'tanggal_expired' => $request->tanggal_expired
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil ditambahkan',
            'data' => $obat
        ], 201);
    }

    /**
     * Menampilkan satu data obat.
     */
    public function show(string $id)
    {
        $obat = Obat::find($id);

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data obat ditemukan',
            'data' => $obat
        ], 200);
    }

    /**
     * Mengubah data obat.
     */
    public function update(Request $request, string $id)
    {
        $obat = Obat::find($id);

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'required',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_expired' => 'required|date'
        ]);

        $obat->update([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'stock_obat' => $request->stock_obat,
            'tanggal_expired' => $request->tanggal_expired
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil diperbarui',
            'data' => $obat
        ], 200);
    }

    /**
     * Menghapus data obat.
     */
    public function destroy(string $id)
    {
        $obat = Obat::find($id);

        if (!$obat) {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak ditemukan'
            ], 404);
        }

        $obat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil dihapus'
        ], 200);
    }
}