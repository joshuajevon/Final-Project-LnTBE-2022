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
    <h1>Update Data</h1>
    <form action="{{route('update' , ['id'=>$barang->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="kategoriBarang" class="form-label">Kategori Barang</label>
            <input name="kategoriBarang" type="text" class="form-control" id="kategoriBarang" value="{{$barang->kategoriBarang }}" placeholder="Masukkan Kategori Barang">

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
            <label for="hargaBarang" class="form-label">Harga Barang</label>
            <input name= "hargaBarang" type="number" class="form-control" id="hargaBarang" value="{{ $barang->hargaBarang }}" placeholder="Masukkan Harga Barang">

            @error('hargaBarang')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlahBarang" class="form-label">Jumlah Barang</label>
            <input name= "jumlahBarang" type="number" class="form-control" id="jumlahBarang" value="{{ $barang->jumlahBarang }}" placeholder="Masukkan Jumlah Barang">

            @error('jumlahBarang')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fotoBarang" class="form-label">Foto Barang</label>
            <input name= "fotoBarang" type="file" class="form-control" id="fotoBarang" value="{{ $barang->fotoBarang }}" placeholder="Masukkan Foto Barang">

            @error('fotoBarang')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>


</body>
</html>
