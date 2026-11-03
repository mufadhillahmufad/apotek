<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(Pelanggan::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pelanggan' => 'required|unique:pelanggans',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $pelanggan = Pelanggan::create($data);

        return response()->json([
            'message' => 'Data pelanggan berhasil ditambahkan',
            'data' => $pelanggan
        ], 201);
    }

    public function show(Pelanggan $pelanggan)
    {
        return response()->json($pelanggan);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate([
            'id_pelanggan' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $pelanggan->update($data);

        return response()->json([
            'message' => 'Data pelanggan berhasil diubah',
            'data' => $pelanggan
        ]);
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return response()->json([
            'message' => 'Data pelanggan berhasil dihapus'
        ]);
    }
}