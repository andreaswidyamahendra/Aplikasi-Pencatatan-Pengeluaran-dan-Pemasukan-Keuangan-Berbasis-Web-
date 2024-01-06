<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();

        return view('/transaksi.transaksi', compact('transaksi'));
    }

    public function tambahtransaksi(Request $request)
    {
        $kategoriPemasukan = Kategori::where('jenis_kategori', 'Pemasukan')->get();
        $kategoriPengeluaran = Kategori::where('jenis_kategori', 'Pengeluaran')->get();

        return view('transaksi.tambahtransaksi', [
            'kategoriPemasukan' => $kategoriPemasukan,
            'kategoriPengeluaran' => $kategoriPengeluaran,
        ]);
    }

    public function simpanTransaksi(Request $request)
    {
        $request->validate([
            'jenis_kategori' => 'required|in:Pemasukan,Pengeluaran',
            'kategori' => 'required',
            'nominal' => 'required|numeric',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $transaksi = new Transaksi();
        $transaksi->jenis_kategori = $request->jenis_kategori;
        $transaksi->nama_kategori = $request->nama_kategori;
        $transaksi->nominal = $request->nominal;
        $transaksi->deskripsi = $request->deskripsi;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->save();

        return redirect('/transaksi')->with('status', 'sukses');
    }

    public function edittransaksi($id)
    {
        $transaksi = Transaksi::find($id);

        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kategori' => 'required|in:Pemasukan,Pengeluaran',
            'nama_kategori' => 'required',
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->jenis_kategori = $request->jenis_kategori;
        $transaksi->nama_kategori = $request->nama_kategori;
        $transaksi->nominal = $request->nominal;
        $transaksi->deskripsi = $request->deskripsi;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->save();

        return redirect('/transaksi')->with('status', 'Transaksi berhasil diperbarui.');
    }
    
    public function delete($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi->delete();

        return redirect('/transaksi')->with('status', 'Transaksi berhasil dihapus.');
    }

}
