<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Staf;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('dashboard');
    }


    /*
    |--------------------------------------------------------------------------
    | PELANGGAN
    |--------------------------------------------------------------------------
    */

    public function pelanggan()
    {
        $pelanggan = Pelanggan::orderBy('created_at', 'desc')->get();

        return view('pelanggan', compact('pelanggan'));
    }

    public function storePelanggan(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|unique:pelanggans,id_pelanggan',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        Pelanggan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    public function editPelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('edit-pelanggan', compact('pelanggan'));
    }

    public function updatePelanggan(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'id_pelanggan' => [
                'required',
                Rule::unique('pelanggans', 'id_pelanggan')
                    ->ignore($pelanggan->id)
            ],
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $pelanggan->update([
            'id_pelanggan' => $request->id_pelanggan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function deletePelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil dihapus!');
    }


    /*
    |--------------------------------------------------------------------------
    | STAF
    |--------------------------------------------------------------------------
    */

    public function staf()
    {
        $staf = Staf::orderBy('created_at', 'desc')->get();

        return view('staf', compact('staf'));
    }

    public function storeStaf(Request $request)
    {
        $request->validate([
            'id_staff' => 'required|unique:stafs,id_staff',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'no_hp' => 'required'
        ]);

        Staf::create([
            'id_staff' => $request->id_staff,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/staf')
            ->with('success', 'Data staf berhasil ditambahkan!');
    }

    public function editStaf($id)
    {
        $staf = Staf::findOrFail($id);

        return view('edit-staf', compact('staf'));
    }

    public function updateStaf(Request $request, $id)
    {
        $staf = Staf::findOrFail($id);

        $request->validate([
            'id_staff' => [
                'required',
                Rule::unique('stafs', 'id_staff')
                    ->ignore($staf->id)
            ],
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

        return redirect('/staf')
            ->with('success', 'Data staf berhasil diperbarui!');
    }

    public function deleteStaf($id)
    {
        $staf = Staf::findOrFail($id);
        $staf->delete();

        return redirect('/staf')
            ->with('success', 'Data staf berhasil dihapus!');
    }


    /*
    |--------------------------------------------------------------------------
    | OBAT
    |--------------------------------------------------------------------------
    */

    public function obat()
    {
        $obat = Obat::orderBy('created_at', 'desc')->get();

        return view('obat', compact('obat'));
    }

    public function storeObat(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obats,kode_obat',
            'nama_obat' => 'required',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_expired' => 'required|date'
        ]);

        Obat::create([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'stock_obat' => $request->stock_obat,
            'tanggal_expired' => $request->tanggal_expired
        ]);

        return redirect('/obat')
            ->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function editObat($id)
    {
        $obat = Obat::findOrFail($id);

        return view('edit-obat', compact('obat'));
    }

    public function updateObat(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'kode_obat' => [
                'required',
                Rule::unique('obats', 'kode_obat')
                    ->ignore($obat->id)
            ],
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

        return redirect('/obat')
            ->with('success', 'Data obat berhasil diperbarui!');
    }

    public function deleteObat($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect('/obat')
            ->with('success', 'Data obat berhasil dihapus!');
    }
}