<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Sanksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Detail Sanksi</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <p><strong>ID Anggota:</strong> {{ $sanksi->id_anggota }}</p>
                        <p><strong>ID Peminjaman:</strong> {{ $sanksi->id_peminjaman }}</p>
                        <p><strong>Jumlah Denda:</strong> {{ $sanksi->jumlah_denda }}</p>
                        <p><strong>Status:</strong> {{ $sanksi->status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
