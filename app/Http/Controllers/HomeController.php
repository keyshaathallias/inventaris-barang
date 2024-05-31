<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemakaian;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $dataUser = User::limit(3)->get();

        $pembelian = Pembelian::all();
        $dataPembelian = Pembelian::limit(3)->get();

        $pemakaian = Pemakaian::all();
        $dataPemakaian = Pemakaian::limit(3)->get();

        $barang = Barang::all();
        $dataBarang = Barang::limit(3)->get();

        $totalInventaris = Barang::count();
        $totalPembelian  = Pembelian::count();
        $totalPemakaian  = Pemakaian::count();
        $totalUser       = User::count();

        return view('pages.dashboard', compact('dataUser', 'dataPembelian', 'dataPemakaian', 'dataBarang', 'totalInventaris', 'totalPembelian', 'totalPemakaian', 'totalUser'));
    }
}
