<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.kategori', compact('kategori'));
    }

    public function tambahkategori(Request $request)
    {
        
        return view('/kategori.tambahkategori');
    }

    public function simpankategori(Request $request)
    {
        $request->validate([
            'jenis_kategori' => 'required|in:Pemasukan,Pengeluaran',
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $kategori = new Kategori();
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        // Redirect atau response sesuai kebutuhan
        return redirect('/kategori')->with('status', 'sukses');
    }

    public function editkategori($id)
    {
        $kategori = Kategori::find($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kategori' => 'required|in:Pemasukan,Pengeluaran',
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::find($id);
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        return redirect('/kategori')->with('status', 'Kategori berhasil diperbarui.');
    }
    
    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/kategori')->with('status', 'Kategori berhasil dihapus.');
    }
}
