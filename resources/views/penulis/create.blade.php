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
                        <form action="{{ route('penulis.store') }}" method="POST"  >
                          @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Penulis</label>
                                <input type="text" name="nama_penulis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                @error('nama_penulis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tempat Lahir</label>
                              <input type="text" name="tempat_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Tempat Lahir">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('tempat_lahir')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputTanggalLahir">Tanggal Lahir</label>
                              <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputTanggalLahir" aria-describedby="tanggalLahirHelp">
                              <small id="tanggalLahirHelp" class="form-text text-muted"></small>
                              @error('tanggal_lahir')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                              <div class="form-group">
                              <label for="exampleInputEmail">Alamat Email</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter alamat email">
                              <small id="emailHelp" class="form-text text-muted"></small>
                              @error('email')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>