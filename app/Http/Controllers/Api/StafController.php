<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staf;
use Illuminate\Http\Request;

class StafController extends Controller
{
    /**
     * Menampilkan semua data staf.
     */
    public function index()
    {
        $staf = Staf::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data staf berhasil diambil',
            'data' => $staf
        ], 200);
    }

    /**
     * Menambahkan data staf.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_staff' => 'required|unique:stafs,id_staff',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'no_hp' => 'required'
        ]);

        $staf = Staf::create([
            'id_staff' => $request->id_staff,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'no_hp' => $request->no_hp
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data staf berhasil ditambahkan',
            'data' => $staf
        ], 201);
    }

    /**
     * Menampilkan satu data staf.
     */
    public function show(string $id)
    {
        $staf = Staf::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data staf ditemukan',
            'data' => $staf
        ], 200);
    }

    /**
     * Mengubah data staf.
     */
    public function update(Request $request, string $id)
    {
        $staf = Staf::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'id_staff' => 'required|unique:stafs,id_staff,' . $staf->id,
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'no_hp' => 'required'
        ]);

        $staf->update([
            'id_staff' => $request->id_staff,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'no_hp' => $request->no_hp
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data staf berhasil diperbarui',
            'data' => $staf
        ], 200);
    }

    /**
     * Menghapus data staf.
     */
    public function destroy(string $id)
    {
        $staf = Staf::find($id);

        if (!$staf) {
            return response()->json([
                'success' => false,
                'message' => 'Data staf tidak ditemukan'
            ], 404);
        }

        $staf->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data staf berhasil dihapus'
        ], 200);
    }
}