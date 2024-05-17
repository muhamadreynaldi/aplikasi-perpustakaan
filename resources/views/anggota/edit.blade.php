<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Anggota</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('anggota.update', $dataAnggota->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Tulis Nama" value="{{ old('nama', $dataAnggota->nama) }}">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nomor Telepon</label>
                              <input type="text" name="no_hp" class="form-control" placeholder="Tulis Nomor Telepon" value="{{ old('no_hp', $dataAnggota->no_hp) }}">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('no_hp')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputTanggalLahir">Alamat</label>
                              <input type="text" name="alamat" class="form-control" placeholder="Tulis Alamat" value="{{ old('alamat', $dataAnggota->alamat) }}">
                              <small id="tanggalLahirHelp" class="form-text text-muted"></small>
                              @error('alamat')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                              <div class="form-group">
                              <label for="exampleInputEmail">Alamat Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Tulis Email" value="{{ old('email', $dataAnggota->email) }}">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('email')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
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