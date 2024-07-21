<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peminjaman</title>
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
                        <a href="{{ route('peminjaman.create') }}" class="btn btn-md btn-info mb-3">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No Buku</th>
                                    <th scope="col">ID Anggota</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Tanggal Pengembalian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPeminjaman as $peminjaman)
                                    <tr>
                                        <td>{{ $peminjaman->no_buku }}</td>
                                        <td>{{ $peminjaman->id_anggota }}</td>
                                        <td>{{ $peminjaman->tgl_peminjaman }}</td>
                                        <td>{{ $peminjaman->tgl_pengembalian }}</td>
                                        <td>{{ $peminjaman->status }}</td>
                                        <td>
                                            <a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>

                                        </td>                                            
                                        <a href="{{ route('sanksi.index')}}" class="btn btn-md btn-info mb-3">Laman Sanksi</a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
