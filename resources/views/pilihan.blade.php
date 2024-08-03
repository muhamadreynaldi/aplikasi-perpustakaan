<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Peran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h3 class="mb-4">Pilih Peran Anda</h3>
                <a href="{{ route('anggota.index') }}" class="btn btn-lg btn-primary mb-3">Anggota</a>
                <a href="{{ route('penulis.index') }}" class="btn btn-lg btn-secondary mb-3">Penulis</a>
            </div>
        </div>
    </div>
</body>
</html>
