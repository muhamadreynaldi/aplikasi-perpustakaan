<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Tambah Data Buku</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id_penulis">ID Penulis</label>
                            <select name="id_penulis" id="id_penulis" class="form-control">
                                <option value="">Pilih ID Penulis</option>
                                @foreach($penulis as $p)
                                    <option value="{{ $p->id }}">{{ $p->id }}</option>
                                @endforeach
                            </select>
                            @error('id_penulis')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_rak">Nomor Rak</label>
                            <select name="id_rak" id="id_rak" class="form-control">
                                <option value="">Pilih Nomor Rak</option>
                                @foreach($rak as $r)
                                    <option value="{{ $r->id }}">{{ $r->id }}</option>
                                @endforeach
                            </select>
                            @error('id_rak')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_buku">Nomor Buku</label>
                            <input type="text" name="no_buku" class="form-control" id="no_buku" placeholder="Nomor Buku">
                            @error('no_buku')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Buku">
                            @error('judul')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edisi">Edisi</label>
                            <input type="text" name="edisi" class="form-control" id="edisi" placeholder="Edisi">
                            @error('edisi')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                       <div class="form-group">
                            <label for="tahun">Tahun Terbit</label>
                            <input type="date" name="tahun" class="form-control" id="tahun">
                            @error('tahun')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit">
                            @error('penerbit')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
