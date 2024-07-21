<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Sanksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Edit Sanksi</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('sanksi.update', $dataSanksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_anggota">ID Anggota</label>
                                <select name="id_anggota" class="form-control" id="id_anggota">
                                    @foreach ($anggota as $item)
                                        <option value="{{ $item->id }}" {{ $dataSanksi->id_anggota == $item->id ? 'selected' : '' }}>
                                            {{ $item->id }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_anggota')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_peminjaman">ID Peminjaman</label>
                                <select name="id_peminjaman" class="form-control" id="id_peminjaman">
                                    @foreach ($peminjaman as $item)
                                        <option value="{{ $item->id }}" {{ $dataSanksi->id_peminjaman == $item->id ? 'selected' : '' }}>
                                            {{ $item->id }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_peminjaman')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah_denda">Jumlah Denda</label>
                                <input type="number" name="jumlah_denda" class="form-control" id="jumlah_denda" value="{{ $dataSanksi->jumlah_denda }}">
                                @error('jumlah_denda')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="tunggakan" {{ $dataSanksi->status == 'tunggakan' ? 'selected' : '' }}>Tunggakan</option>
                                    <option value="lunas" {{ $dataSanksi->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                        <a href="{{ route('sanksi.index') }}" class="btn btn-md btn-info mt-3">Kembali ke Daftar Sanksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

