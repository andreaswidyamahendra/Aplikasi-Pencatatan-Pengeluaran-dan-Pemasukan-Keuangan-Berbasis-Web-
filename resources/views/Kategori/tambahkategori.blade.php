@extends('layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="display-5">Tambah Kategori</h2>
            <a href="/kategori" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ url('/simpankategori') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="jenis_kategori">Jenis Kategori:</label>
                <select name="jenis_kategori" id="jenis_kategori" class="form-control">
                    <option value="">Pilih Jenis Kategori</option>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <select name="nama_kategori" id="nama_kategori" class="form-control">
                    <option value="">Pilih Nama Kategori</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var jenisSelect = document.getElementById('jenis_kategori');
        var namaSelect = document.getElementById('nama_kategori');

        jenisSelect.addEventListener('change', function () {
            namaSelect.innerHTML = ''; // Mengosongkan pilihan sebelumnya

            var option = document.createElement("option");
            option.value = "";
            option.text = "Pilih Nama Kategori";

            if (jenisSelect.value === "Pemasukan") {
                var kategoriPemasukan = ["Gaji", "Tunjangan", "Bonus"];
                for (var i = 0; i < kategoriPemasukan.length; i++) {
                    var option = document.createElement("option");
                    option.value = kategoriPemasukan[i];
                    option.text = kategoriPemasukan[i];
                    namaSelect.add(option);
                }
            } else if (jenisSelect.value === "Pengeluaran") {
                var kategoriPengeluaran = ["Sewa Kost", "Makan", "Pakaian", "Nonton Bioskop"];
                for (var i = 0; i < kategoriPengeluaran.length; i++) {
                    var option = document.createElement("option");
                    option.value = kategoriPengeluaran[i];
                    option.text = kategoriPengeluaran[i];
                    namaSelect.add(option);
                }
            } else {
                namaSelect.add(option);
            }
        });
    });
</script>

@endsection
