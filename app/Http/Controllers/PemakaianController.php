<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemakaian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemakaian = Pemakaian::with('barang')->get();

        $title = 'Delete Pemakaian!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.pemakaian', [
            'pemakaian' => $pemakaian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.createPemakaian');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "kode_barang"   => "required",
            "jumlah"        => "required",
            "tanggal"       => "required",
            "ruang"         => "required",
            "keterangan"    => "required",
        ]);

        Pemakaian::create($credentials);

        $barang = Barang::findOrFail($request->kode_barang);
        $barang->jumlah -= $request->jumlah;
        $barang->save();
        
        return redirect()->route('pemakaian.index')->with('success', 'Data Pemakaian Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pemakaian::where('id', $id)->first();
        return view('pages.editPemakaian', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $credentials = $request->validate([
            "jumlah"        => "required",
            "tanggal"       => "required",
            "ruang"         => "required",
            "keterangan"    => "required",
        ]);
        
        $pemakaian = Pemakaian::findOrFail($id);

        $oldJumlah = $pemakaian->jumlah;

        $pemakaian->update($credentials);

        $barang = Barang::findOrFail($pemakaian->kode_barang);
        $barang->jumlah = $barang->jumlah + $oldJumlah - $request->jumlah;
        $barang->save();

        return redirect('/pemakaian')->with('success', 'Data Pemakaian Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $pemakaian = Pemakaian::findOrFail($id);
        $pemakaian->delete();
        return redirect('/pemakaian')->with('success', 'Data Berhasil Dihapus!');
    }
}
