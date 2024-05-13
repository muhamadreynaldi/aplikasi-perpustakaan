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
                        <form action="{{ route('buku.update', $dataBuku->no_buku) }}" method="POST">
                          @csrf
                          @method('PUT')

                              <div class="form-group">
    <label for="id_penulis">ID Penulis</label>
    <select name="id_penulis" id="id_penulis" class="form-control">
        <option value="">Pilih ID Penulis</option>
        @foreach($penulis as $p)
            <option value="{{ $p->id }}" @if($p->id == $dataBuku->id_penulis) selected @endif>{{ $p->id }}</option>
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
            <option value="{{ $r->id }}" @if($r->id == $dataBuku->id_rak) selected @endif>{{ $r->id }}</option>
        @endforeach
    </select>
    @error('id_rak')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>
                        <div class="form-group">
                            <label for="no_buku">Nomor Buku</label>
                            <input type="text" name="no_buku" class="form-control" placeholder="Tulis Nomor Buku" value="{{ old('no_buku', $dataBuku->no_buku) }}">
                            @error('no_buku')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Tulis Judul Buku" value="{{ old('judul', $dataBuku->judul) }}">
                            @error('judul')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edisi">Edisi</label>
                            <input type="text" name="edisi" class="form-control" id="edisi" placeholder="Tulis Edisi" value="{{ old('edisi', $dataBuku->edisi) }}">
                            @error('edisi')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                       <div class="form-group">
                            <label for="tahun">Tahun Terbit</label>
                            <input type="date" name="tahun" class="form-control" id="tahun" placeholder="Tulis Tahun Terbit" value="{{ old('tahun', $dataBuku->tahun) }}">
                            @error('tahun')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Tulis Penerbit" value="{{ old('penerbit', $dataBuku->penerbit) }}">
                            @error('penerbit')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
           
                        
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>