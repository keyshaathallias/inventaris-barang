<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::with('barang')->get();

        $title = 'Delete Pembelian!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.pembelian', [
            'pembelian' => $pembelian
        ]);
    }

    public function create()
    {
        return view('pages.createPembelian');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            "kode_barang" => "required",
            "merk"        => "required",
            "jumlah"      => "required",
        ]);

        Pembelian::create($credentials);

        $barang = Barang::findOrFail($request->kode_barang);
        $barang->jumlah += $request->jumlah;
        $barang->save();

        return redirect()->route('pembelian.index')->with('success', 'Data Barang Berhasil Dibuat!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Pembelian::where('id', $id)->first();
        return view('pages.editPembelian', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $credentials = $request->validate([
            // "kode_barang" => "required",
            "merk"        => "required",
            "jumlah"      => "required",
        ]);
        
        $pembelian = Pembelian::findOrFail($id);

        $oldJumlah = $pembelian->jumlah;

        $pembelian->update($credentials);

        $barang = Barang::findOrFail($pembelian->kode_barang);
        $barang->jumlah = $barang->jumlah - $oldJumlah + $request->jumlah;
        $barang->save();

        return redirect('/pembelian')->with('success', 'Data Barang Berhasil Diubah!');
    }

    public function destroy($id): RedirectResponse
    {
        $pembelian = Pembelian::findOrFail($id);
        Pembelian::where('id', $id)->delete();
        $pembelian->delete();
        return redirect('/pembelian')->with('success', 'Data Berhasil Dihapus!');
    }
}
