@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="display-5">Edit Transaksi</h2>
                <a href="/transaksi" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="/transaksi/update/{{ $transaksi->id }}" method="POST">
                @csrf
                <div class="form-group">
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $transaksi->tanggal }}" required>
                </div>
                    <label for="jenis_kategori">Jenis:</label>
                    <select name="jenis_kategori" id="jenis_kategori" class="form-control">
                        <option value="Pemasukan" {{ $transaksi->jenis_kategori == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="Pengeluaran" {{ $transaksi->jenis_kategori == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_kategori">Nama:</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $transaksi->nama_kategori }}" required>
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal:</label>
                    <input type="text" name="nominal" id="nominal" class="form-control" value="{{ $transaksi->nominal }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ $transaksi->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
