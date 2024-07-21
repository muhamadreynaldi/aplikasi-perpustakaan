<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Edit Data Peminjaman</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    <form action="{{ route('peminjaman.update', $dataPeminjaman->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="no_buku">Nomor Buku</label>
        <input type="text" name="no_buku" class="form-control" id="no_buku" value="{{ $dataPeminjaman->no_buku }}">
        @error('no_buku')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="id_anggota">ID Anggota</label>
        <input type="text" name="id_anggota" class="form-control" id="id_anggota" value="{{ $dataPeminjaman->id_anggota }}">
        @error('id_anggota')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tgl_peminjaman">Tanggal Peminjaman</label>
        <input type="date" name="tgl_peminjaman" class="form-control" id="tgl_peminjaman" value="{{ $dataPeminjaman->tgl_peminjaman }}">
        @error('tgl_peminjaman')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
        <input type="date" name="tgl_pengembalian" class="form-control" id="tgl_pengembalian" value="{{ $dataPeminjaman->tgl_pengembalian }}">
        @error('tgl_pengembalian')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
