<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Buku</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('buku.create') }}" class="btn btn-md btn-info mb-3">Tambah</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID Penulis</th>
                                <th scope="col">Nomor Rak</th>
                                <th scope="col">Nomor Buku</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Edisi</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBuku as $buku)
                                <tr>
                                    <td>{{ $buku->penulis->id }}</td>
                                    <td>{{ $buku->rak->id }}</td>
                                    <td>{{ $buku->no_buku }}</td>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ $buku->edisi }}</td>
                                    <td>{{ $buku->tahun }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>
                                        <a href="{{ route('buku.show', $buku->no_buku) }}" class="btn btn-sm btn-dark">Lihat</a>
                                        <a href="{{ route('buku.edit', $buku->no_buku) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('buku.destroy', $buku->no_buku) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <a href="{{ route('penulis.index', $buku->penulis->id) }}" class="btn btn-md btn-info mb-3 me-1">Laman Penulis</a>
                                <a href="{{ route('rak.index', $buku->rak->id) }}" class="btn btn-md btn-info mb-3">Laman Rak</a>
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
