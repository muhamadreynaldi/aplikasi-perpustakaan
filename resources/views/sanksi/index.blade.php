<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Sanksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Sanksi</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('sanksi.create') }}" class="btn btn-md btn-info mb-3">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID Anggota</th>
                                    <th scope="col">ID Peminjaman</th>
                                    <th scope="col">Jumlah Denda</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSanksi as $sanksi)
                                    <tr>
                                        <td>{{ $sanksi->id_anggota }}</td>
                                        <td>{{ $sanksi->id_peminjaman }}</td>
                                        <td>{{ $sanksi->jumlah_denda }}</td>
                                        <td>{{ $sanksi->status }}</td>
                                        <td>
                                            <a href="{{ route('sanksi.show', $sanksi->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                            <a href="{{ route('sanksi.edit', $sanksi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('sanksi.destroy', $sanksi->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $dataSanksi->links() }}
                        <a href="{{ route('rak.index') }}" class="btn btn-md btn-info mb-3">Laman Rak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
