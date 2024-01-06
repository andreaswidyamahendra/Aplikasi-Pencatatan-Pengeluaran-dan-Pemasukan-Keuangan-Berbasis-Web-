<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <h1 class="display-4">Home</h1>
        </div>
        <div class="card-body">
            <p class="lead">Selamat Datang</p>
            <a href="/transaksi" class="btn btn-primary">Lihat Transaksi</a>
            <a href="/kategori" class="btn btn-primary">Lihat Kategori</a>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Saldo Saat Ini</h5>
                            <p class="card-text">Rp {{ $saldo }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Pengeluaran</h5>
                            <p class="card-text">Rp {{ $totalPengeluaran }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Pemasukan</h5>
                            <p class="card-text">Rp {{ $totalPemasukan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
