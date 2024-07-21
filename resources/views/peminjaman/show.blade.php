<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Peminjaman</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="card-body">
                            <h3>{{ $peminjaman->no_buku }}</h3>
                            <h3>{{ $peminjaman->id_anggota }}</h3>
                            <h3>{{ $peminjaman->tgl_peminjaman }}</h3>
                            <h3>{{ $peminjaman->tgl_pengembalian }}</h3>
                            <h3>{{ $peminjaman->status }}</h3>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>