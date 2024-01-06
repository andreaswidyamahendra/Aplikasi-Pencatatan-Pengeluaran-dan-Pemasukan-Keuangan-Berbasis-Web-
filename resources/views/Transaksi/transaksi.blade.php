@extends('layouts.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="display-5">Menu Transaksi</h2>
            <a href="/tambahtransaksi" class="btn btn-primary">Tambah Transaksi</a>
            <a href="/" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <!-- Monthly Transactions Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Transaksi</th>
                    <th scope="col">Jenis Kategori</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi as $t)
                    <tr>
                        <th scope="row">{{ $t->tanggal }}</th>
                        <td>{{ $t->jenis_kategori }}</td>
                        <td>{{ $t->nama_kategori }}</td>
                        <td>{{ $t->nominal }}</td>
                        <td>
                                <a href="/transaksi/edit/{{ $t->id }}" class="btn btn-warning">Edit</a>
                                <a href="/transaksi/delete/{{ $t->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
