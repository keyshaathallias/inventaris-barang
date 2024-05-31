<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    public function index()
    {
        $inventarisBarang = Barang::with(['daftarPembelian', 'daftarPemakaian'])->get();
        return view('pages.laporan', [
            'inventarisBarang' => $inventarisBarang
        ]);
    }

    public function exportPdf(Request $request)
    {
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        Log::info("Start Date: $start_date, End Date: $end_date");

        if (!$start_date || !$end_date) {
            return redirect()->route('laporan.index')->with('error', 'Please provide a valid date range.');
        }

        $inventarisBarang = Barang::with(['daftarPembelian', 'daftarPemakaian' => function ($query) use ($start_date, $end_date) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        }])
        ->whereHas('daftarPemakaian', function ($query) use ($start_date, $end_date) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        })
        ->get();

        $pdf = Pdf::loadView('pages.laporan_pdf', ['inventarisBarang' => $inventarisBarang]);
        return $pdf->stream('laporan-inventaris-barang.pdf');
    }
}
