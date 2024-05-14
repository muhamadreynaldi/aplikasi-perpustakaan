<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Penulis</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('penulis.create') }}" class="btn btn-md btn-info mb-3">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Penulis</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPenulis as $index => $penulis)
                                    <tr>
                                        <td>{{ $penulis->nama_penulis }}</td>
                                        <td>{{ $penulis->tempat_lahir }}</td>
                                        <td>{{ $penulis->tanggal_lahir }}</td>
                                        <td>{{ $penulis->email }}</td>
                                        <td>
                                            <a href="{{ route('penulis.show', $penulis->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                            <a href="{{ route('penulis.edit', $penulis->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <a href="{{ route('rak.index')}}" class="btn btn-md btn-info mb-3">Laman Rak</a>
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
