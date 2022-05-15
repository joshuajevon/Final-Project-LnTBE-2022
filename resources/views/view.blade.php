<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/view.css">
</head>
<body>

    <h1>Lihat Data</h1>

    <form class="insert" action="{{route('insert')}}" method="get">
        <button class="btn btn-primary" type="submit">Insert </button>
    </form>

    <form action="{{route('login')}}">
        <button >Login</button>
    </form>

    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>

    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Kategori</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Foto</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <th scope="row">{{ $barang->id }}</th>
                    <td>
                        {{$barang->kategoriBarang}}
                    </td>
                    <td>
                        {{$barang->namaBarang}}
                    </td>
                    <td>
                        Rp.{{$barang->hargaBarang}}
                    </td>
                    <td>
                        {{$barang->jumlahBarang}}
                    </td>
                    <td>
                        <img src="{{asset('storage/image/'.$barang->fotoBarang)}}" alt="" style="width: 300px">
                    </td>
                    <td >
                        <a href="{{route('updateBarang', ['id'=>$barang->id])}}"><button type="submit" class="btn btn-success">Update</button></a>

                        <form action="{{route('delete', ['id' => $barang->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
