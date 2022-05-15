<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/form.css">
</head>
<body>
<form action="/cetakfaktur/{{$barang->id}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="kategoriBarang" class="form-label">Kategori Barang</label>
        <input name="kategoriBarang" type="text" class="form-control" id="kategoriBarang" value="{{ $barang->kategoriBarang }}" placeholder="Masukkan Kategori Barang">

        @error('kategoriBarang')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="namaBarang" class="form-label">Nama Barang</label>
        <input name= "namaBarang" type="text" class="form-control" id="namaBarang" value="{{ $barang->namaBarang }}" placeholder="Masukkan Nama Barang">

        @error('namaBarang')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
        <input name= "jumlahBarang" type="number" class="form-control" id="jumlahBarang" value="{{old('jumlahBarang')}}" placeholder="Masukkan Jumlah Barang">

        @error('jumlahBarang')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">alamat</label>
        <input name= "alamat" type="text" class="form-control" id="alamat" value="{{ old('alamat') }}" placeholder="Masukkan alamat">

        @error('alamat')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="kodePos" class="form-label">kode pos</label>
        <input name= "kodePos" type="text" class="form-control" id="kodePos" value="{{ old('kodePos') }}" placeholder="Masukkan kodePos">

        @error('kodePos')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">cetak</button>
</form>

</body>
</html>
