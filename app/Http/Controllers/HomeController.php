<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Transaksi;

class HomeController extends Controller
{
    public function index()
    {
        $totalPemasukan = Transaksi::where('jenis_kategori', 'Pemasukan')->sum('nominal');
        $totalPengeluaran = Transaksi::where('jenis_kategori', 'Pengeluaran')->sum('nominal');
        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('home', compact('saldo', 'totalPengeluaran', 'totalPemasukan'));
    }
}
