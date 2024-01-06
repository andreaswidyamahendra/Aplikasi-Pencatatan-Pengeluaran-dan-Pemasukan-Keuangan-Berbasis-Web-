@extends('layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="display-5">Tambah Transaksi</h2>
            <a href="/transaksi" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        
        <form action="{{ url('/simpantransaksi') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                    <input type="date" name="tanggal" class="form-control">
                <label for="jenis_kategori">Jenis Transaksi:</label>

                <select name="jenis_kategori" id="jenis_kategori" class="form-control" onchange="updateFields()">
                    <option value="">Pilih Jenis Transaksi</option>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
            </div>
            
            <div id="pemasukanFields" style="display: none;">
                <label for="nama_kategori">Kategori Pemasukan:</label>
                <select name="nama_kategori" id="nama_kategori" class="form-control">
                    @foreach($kategoriPemasukan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
                <label for="nominal">Nominal Pemasukan:</label>
                <input type="number" id="nominal" name="nominal" class="form-control">

                <label for="deskripsi">Deskripsi Pemasukan:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <div id="pengeluaranFields" style="display: none;">
                <label for="nama_kategori">Kategori Pengeluaran:</label>
                <select name="nama_kategori" id="nama_kategori" class="form-control">
                    <!-- Mengambil data kategori pengeluaran dari database -->
                    @foreach($kategoriPengeluaran as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
                <label for="nominal">Nominal Pengeluaran:</label>
                <input type="number" id="nominal" name="nominal" class="form-control">
                <label for="deskripsi">Deskripsi Pengeluaran:</label>
                <textarea name="deskripsi"  id="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
    function updateFields() {
        var jenisSelect = document.getElementById('jenis_kategori');
        var pemasukanFields = document.getElementById('pemasukanFields');
        var pengeluaranFields = document.getElementById('pengeluaranFields');
        var kategoriPemasukan = document.getElementById('kategoriPemasukan');
        var kategoriPengeluaran = document.getElementById('kategoriPengeluaran');

        if (jenisSelect.value === 'Pemasukan') {
            pemasukanFields.style.display = 'block';
            pengeluaranFields.style.display = 'none';
            kategoriPemasukan.setAttribute('name', 'kategori');
            kategoriPengeluaran.removeAttribute('name');
        } else if (jenisSelect.value === 'Pengeluaran') {
            pemasukanFields.style.display = 'none';
            pengeluaranFields.style.display = 'block';
            kategoriPengeluaran.setAttribute('name', 'kategori');
            kategoriPemasukan.removeAttribute('name');
        } else {
            pemasukanFields.style.display = 'none';
            pengeluaranFields.style.display = 'none';
            kategoriPemasukan.removeAttribute('name');
            kategoriPengeluaran.removeAttribute('name');
        }
    }
</script>

@endsection
