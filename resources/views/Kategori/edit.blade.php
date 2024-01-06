@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="display-5">Edit Kategori</h2>
                <a href="/kategori" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="/kategori/update/{{ $kategori->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jenis_kategori">Jenis:</label>
                    <select name="jenis_kategori" id="jenis_kategori" class="form-control">
                        <option value="Pemasukan" {{ $kategori->jenis_kategori == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="Pengeluaran" {{ $kategori->jenis_kategori == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_kategori">Nama:</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ $kategori->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
