<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemakaian;
use App\Models\Pembelian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $daftarBarang = Barang::all();

        $title = 'Delete Barang!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.inventarisir', [
            'daftarBarang' => $daftarBarang
        ]);
    }

    public function create()
    {
        return view('pages.createBarang');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            "kode"      => "required",
            "nama"      => "required",
            "jenis"     => "required",
            "jumlah"    => "required",
            "harga"     => "required",
        ]);

        Barang::create($credentials);
        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Dibuat!');

        // Barang::create([
        //     "kode" => $request->kode,
        //     "nama" => $request->nama,
        //     "jenis" => $request->jenis,
        //     "jumlah" => $request->jumlah,
        //     "harga" => $request->harga
        // ]);

        // return redirect()->route('barang.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $kode)
    {
        $data = Barang::where('kode', $kode)->first();
        return view('pages.editBarang', compact('data'));

    }

    public function update(Request $request, string $kode)
    {
        $credentials = $request->validate([
            "kode"      => "required",
            "nama"      => "required",
            "jenis"     => "required",
            "jumlah"    => "required",
            "harga"     => "required",
        ]);

        Barang::where('kode', $kode)->update($credentials);
        return redirect('/barang')->with('success', 'Data Barang Berhasil Diubah!');
    }

    public function destroy($kode): RedirectResponse
    {
        $barang = Barang::findOrFail($kode);

        // Delete all related records in the pembelian table
        Pembelian::where('kode_barang', $kode)->delete();

        // Delete all related records in the pemakaian table
        Pemakaian::where('kode_barang', $kode)->delete();

        $barang->delete();
        return redirect('/barang')->with('success', 'Data Berhasil Dihapus!');
    }
}
